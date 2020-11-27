<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include("styles.php"); ?>

</head>
<body id="page-top">
 <?php include("header.php"); 
//  if ($r['privilege'] !='admin') {  
//     $sp = $r['staff_privilege'];
//     $ex = explode(',', $sp);
//       if(!in_array('Orders', $ex)){
//         header("Location:index");
//       } 

//   }
  
  
   ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">
<style>
.it{
  height:50px;
  box-shadow:0px 10px 10px 0px rgba(0,0,0,0.19);
  font-size:17px;
  font-weight:bold;
}
.form-control{
  border-color:0px #d2d6de !important;
}
.sweep,.sweep2{
  box-shadow:0px 10px 10px 0px rgba(0,0,0,0.19);
  padding-top:10px;
  padding-left:10px;
  width:20%;
  border:1px solid #d2d6de !important;
}
</style>
      <div class="container">
     
      
      <br>
      
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
             Orders Details </div>
          <div class="card-body">
                                <p class="pull-right" style="font-size:14px"><b>Order Id:</b> <?php echo $_GET['orderid'] ?></p> 
									<div class="row no-gutters">
                                    <?php
                                    if(isset($_GET['orderid']) AND !empty($_GET['orderid'])){
                                    $order = clean($_GET['orderid']);
                                    $sql = $conn->query("SELECT * FROM dcart WHERE orderid='$order'");
                                    if($sql->num_rows>0){
                                        $ppname =''; $total=$total_bill=0;
                                        while($row=$sql->fetch_assoc()):
                                           $total = $row['dtotal'];
                                           $charges = $row['dcharge'];
                                           $payment = $row['dpayment_status'];
                                           $transaction = $row['dorder_status'];
                                           $status = $row['dorder_status'];
                                           $ppname .= $row['pname'].',';
                                           $location = $row['dlocation'];
                                           $address = $row['daddress'];
                                           $total_bill += $total;
                                          //  echo $row['id'];
                                           
                                    ?>
										<div class="col-md-4 col-lg-4 col-xl-4 bg-primarys">
											<div class="img bg-dangers" style="width:100%; padding:10px">
                                              <center>  <img style="max-width:45%; margin: 0 auto !important" src="../_product_images/<?php echo $row['dimg'] ?>" alt="">
                                              </center>
                                            </div>
                                            
										</div>

                                        <div class="col-md-8 col-lg-8 col-xl-8 bg-primaryf">
                                            <h5><?php echo $row['pname'] ?></h5>
                                            <b>Sku:</b> <?php echo $row['dsku'] ?> </span> | <span><b>Brand:</b> <?php echo $row['dbrand'] ?></span> <br>
                                            <b>Unit Price:</b> &#8358;<?php echo number_format($row['dprice']) ?> |
                                            <b>Quantity:</b> <?php echo $row['dqty'] ?> | 
                                            <b>Total:&#8358;</b> <?php echo number_format($row['dtotal']) ?> <br>
                                            <b>Order Status: </b> 
                                            <?php if($status=='pending'){?>
                                            <span class="badge badge-primary"><?php echo ucfirst($status) ?></span> 
                                            <?php }elseif($status=='confirmed' || $status=='shipped'){ ?>
                                            <span class="badge badge-warning"><?php echo ucfirst($status) ?></span> 
                                            <?php }elseif($status=='returned' || $status=='cancelled'){ ?>
                                            <span class="badge badge-danger"><?php echo ucfirst($status) ?></span> 
                                            <?php } ?>
                                            
                                             </p>
                                             <hr>
                                             <?php if($payment=='paid' AND $status=='confirmed'){?>
                                                <button class="btn btn-sm btn-primary" id="markShip" orderId="<?php echo $_GET['orderid']; ?>" rowId="<?php echo $row['id']; ?>" >Mark as Dispatched</button>
                                              <?php } ?>
                                              <?php if($payment=='paid' AND $status=='confirmed'){?>
                                                <button class="btn btn-sm btn-primary" id="markReturned" orderId="<?php echo $_GET['orderid']; ?>" >Mark as Returned</button>
                                              <?php } ?>
                                              <button class="btn btn-sm btn-danger" id="corders" orderId="<?php echo $_GET['orderid']; ?>">Mark as Cancelled</button>
                                            
                                        </div>
                                        <div class="col-md-12"><hr></div>
                                        <?php endwhile;  } 
                                        // $total_bill = $total; 
                                        $charges +=$charges;
                                         $_SESSION['total-bill'] = $total_bill; $_SESSION['ppname'] = rtrim($ppname);
                                          ?>
                                        <div class="col-md-7"> 
                                            <hr>
                                            <?php if($address !=''){?>
                                            <p><b>Delivery Area:</b> <?php   echo $location;  ?> <br>
                                                <b>Address: </b> <?php echo $address; ?>
                                            </p>
                                                <?php }else{?>
                                                    <p><b>Delivery Station:</b> <?php echo $location;  ?> 
                                                </p>
                                            <?php } ?>
                                                <!-- <p><b>Delivery Area/Station:</b> <?php //echo $location ?></p> -->
                                             <hr>
                                            <p>
                                                <b>Total Charges : </b> &#8358;<?php echo number_format($charges); ?>  |
                                                <b>Grand Total: </b>&#8358;  <?php echo number_format($total_bill); ?>  
                                            </p>

                                            </div>
                                            <div class="col-md-5 pl-3">
                                                <p class="pl-3">
                                                <?php if($transaction=='returned' || $transaction=='cancelled' ){?>
                                                <b>Transaction Status: </b>  <?php echo ucfirst($status); ?> 
                                                <?php }else{?>
                                                <p>
                                                <b>Payment Status:  </b> <?php echo ucfirst($payment); ?> <span class="text-success" style="font-size:20px"> &#10004;</span><br>
                                                </p>
                                                <?php }?>
                                                </p>
                                            
                                            </div>

                                     <?php   
                                } ?>
                               
									</div>
                                         

    

        </div>

        <div class="card-footer" style="text-align: right;">
          <?php if($payment=='pending'){?>
            <button class="btn btn-sm btn-primary" id="markPaid" orderId="<?php echo $_GET['orderid']; ?>" >Mark As Paid</button>
          <?php } ?>

          <?php if($payment=='paid' AND $status=='pending'){?>
            <button class="btn btn-sm btn-dark" id="markProcess" orderId="<?php echo $_GET['orderid']; ?>" >Mark as Confirmed</button>
          <?php } ?>

            <button class="btn btn-sm btn-danger" id="corders" orderId="<?php echo $_GET['orderid']; ?>">Cancel All</button>
            <?php sendBack(); ?>
        </div>

        </div>
        </div>

        <?php include("footer.php"); ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<?php include("scripts.php"); ?>


<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="phpfiles/change-password" method="post">
            <div class="form-group">
            <input type="hidden" name="hid" value="<?php echo $r['user_id']; ?>">
            <label for="">Old Password</label>
                <input type="password" placeholder="Old password" required name="old"  id="" class="form-control">
            </div>
            <div class="form-group">
            <label for="">New Password</label>
                <input type="password" required placeholder="New password" name="new"  id="" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Confirm New password</label>
                <input type="password" required placeholder="Confirm New password" name="cnew"  id="" class="form-control">
            </div>
        
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" name="passed" type="submit">Proceed</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="phpfiles/edit-profile" method="POST">
                        <div class="form-group required-field">
                            <label for="contact-name">Name</label>
                            <input type="text" class="form-control" value="<?php echo $r['name'];?>" id="contact-name" name="name" required>
                            <input type="hidden" value="<?php echo $r['user_id'];?>" id="contact-name" name="id" required>
                        </div><!-- End .form-group -->

                        <div class="form-group required-field">
                            <label for="contact-email">Email</label>
                            <input type="email" value="<?php echo $r['email'];?>" class="form-control" id="contact-email" name="email" required>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="contact-phone">Phone Number</label>
                            <input type="tel" value="<?php echo $r['phone'];?>" class="form-control" id="contact-phone" name="phone">
                        </div><!-- End .form-group -->

                       
                        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" name="edited" type="submit">Proceed</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>