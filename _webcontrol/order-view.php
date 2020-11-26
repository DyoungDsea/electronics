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
                                            <?php }elseif($status=='processed' || $status=='shipped'){ ?>
                                            <span class="badge badge-warning"><?php echo ucfirst($status) ?></span> 
                                            <?php }elseif($status=='returned' || $status=='cancelled'){ ?>
                                            <span class="badge badge-danger"><?php echo ucfirst($status) ?></span> 
                                            <?php } ?>
                                            
                                            <br>
                                            
                                             </p>
                                            <?php
                                            if($transaction=='delivered'){   $user = $_SESSION['userid'];
                                            $pro = $row['dpid'];
                                            $xop = $conn->query("SELECT * FROM drating WHERE duserid='$user' AND dpid='$pro' ");
                                            if($xop->num_rows==0):?>
                                             <a href="review-product?product_id=<?php echo $row['dpid'] ?>&orderid=<?php echo $order; ?>&date=<?php echo $_GET['date'] ?>" class="btn btn-sm btn-primary">Review</a>
                                            <?php endif; }?>
                                        </div>
                                        <div class="col-md-12"><hr></div>
                                        <?php endwhile;  } 
                                        // $total_bill = $total; 
                                        $charges +=$charges;
                                         $_SESSION['total-bill'] = $total_bill; $_SESSION['ppname'] = rtrim($ppname);
                                         
                                         if($payment != 'paid' AND $transaction=='pending'){ ?>
                                        <div class="col-md-7"> 
                                            <b>Shipping Charges : </b> &#8358;<?php echo number_format($charges); ?>  <br>
                                            <b>VAT(7.5%): </b>&#8358;  <?php echo number_format($total_bill * 7.5/100); ?> <br>
                                            <b>Sub Total: </b>&#8358;  <?php echo number_format(($total_bill-$charges)- ($total_bill * 7.5/100)); ?> <br>
                                            <b>Grand Total: </b>&#8358;  <?php echo number_format($total_bill); ?>
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
                                        </div>
                                        <div class="col-md-5">
                                        <!-- <hr> -->
                                            
                                            <div class="ml-3">
                                            <p>Use the icon below to make payment</p>
                                        
                                            <form action="cart_pay-up.php" method="post">                                       
                                            <script src="https://js.paystack.co/v1/inline.js" data-key="pk_test_9ebb172d86972b4e6e8a4ad740e8fd5ca4a561c1" data-email="<?php echo $sl['demail'] ?>" data-amount="<?php echo $total_bill * 100; ?>" data-ref="<?php echo $transid; ?>"></script>
                                                        
                                            </form>
                                            </div>
                                    
                                        </div>
                                        <?php }else{?>

                                            <div class="col-md-7">
                                            <p>
                                                <b>Total Charges : </b> &#8358;<?php echo number_format($charges); ?>  |
                                                <b>Grand Total: </b>&#8358;  <?php echo number_format($total_bill); ?>  
                                            </p>

                                            </div>
                                            <div class="col-md-5">
                                                <?php if($transaction=='returned' || $transaction=='cancelled' ){?>
                                                <b>Transaction Status: </b>  <?php echo ucfirst($status); ?> 
                                                <?php }else{?>
                                                <p>
                                                <b>Payment Status:  </b> <?php echo ucfirst($payment); ?> <span class="text-success" style="font-size:20px"> &#10004;</span><br>
                                                </p>
                                                <?php }?>
                                            
                                            </div>

                                     <?php   } 
                                } ?>
                                <?php if($payment =='pending' AND $status =='pending' ):?>
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary" btn="<?php echo $_GET['orderid']; ?>" id="remover">Remove</button>
                                    <?php if($payment !='cancelled' AND $status !='cancelled' ):?>
                                    <button class="btn btn-sm btn-secondary" btn="<?php echo $_GET['orderid']; ?>" id="cancelr">Cancel</button>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
									</div>
                                         


    

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