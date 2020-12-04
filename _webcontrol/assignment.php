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
 if ($r['privilege'] !='admin') {  
    $sp = $r['dprivilege'];
    $ex = explode(',', $sp);
      if(!in_array('Orders', $ex)){
        header("Location:index");
      } 

  }
  
  
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
      <div class="container-fluid">
      
      
      <br>
 
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Orders <span class="text-danger"><?php if(isset($_GET['page_no']) AND @$_GET['page_no'] !=0){ echo "(".$_GET['page_no'].")";} ?></span></div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                <form method="post" action="assignment-process" id="tarp">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location">Choose Location</label>
                                <select name="location" id="location" required class="form-control form-control-sm">
                                <option value="">Choose location </option>
                                <?php $lop = $conn->query("SELECT dlocation FROM dcart WHERE dorder_status='confirmed' OR dorder_status='dispatched' GROUP BY dlocation ORDER BY dlocation");
                                if($lop->num_rows>0){
                                    while($ram=$lop->fetch_assoc()):?>
                                        <option value="<?php echo $ram['dlocation']; ?>"><?php echo $ram['dlocation']; ?></option>
                                    <?php endwhile; } ?>
                                </select>
                            
                        </div>
                        <div class="mt-2">
                            <div id="result"></div>
                        </div>
                    </div>
                        
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <!-- <label for="">Search here...</label> -->
                        <input type="hidden" class="form-control" id="myInput" placeholder="Search">
                    </div>
                </div>
                        </div>
                        
            <div class="table-responsive"  style="min-height:200px" >
              <table class="table table-bordered" id="myDIV" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:12px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                  <th>
                    <!-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Check All</label>
                    </div> -->---
                  </th>
                    <th>Store Name</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    <th>Total Price(&#8358;)</th>
                    <th>Transaction Status</th>
                    <th>Order Date</th>
                  </tr>
                </thead>
                <tbody id="resultorders" >

                <?php
                $out = '';
                $sql=$conn->query("SELECT * FROM login INNER JOIN dcart ON dcart.userid=login.userid WHERE dcart.dorder_status='confirmed' AND dcart.dagent_id IS NULL OR dcart.dorder_status='dispatched' AND dcart.dagent_id IS NULL ORDER BY dcart.id DESC");
                if($sql->num_rows>0){
                    
                    while($row=$sql->fetch_assoc()):
                        $out .='<tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input checkMe" name="works[]" value="'. $row['id'].'" id="customCheck'. $row['id'].'">
                              <label class="custom-control-label" for="customCheck'. $row['id'].'">Check this</label>
                            </div>              
                        </td>
                        <td>'.$row['dcompany'].'</td>
                        <td>'.$row['dlocation'].'</td>
                        <td>'.$row['dname'].'</td>
                        <td>'.number_format($row['dtotal']).'</td>                     
                        <td>'. $row['dorder_status'].'</td>
                        <td>'.$row['created_date'].'</td>
                        
                        </td>
                      </tr>';
                    endwhile;         
                }
echo $out;
                ?>
                  
                
                </tbody>
            </table>
          
            <button type="submit" name="save" class="btn btn-primary">Sumbit</button>
</div>
 

                </form>

        </div>
        </div>
        </div>

        <?php include("footer.php"); ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<?php include("scripts.php"); ?>


<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myDIV tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script>

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