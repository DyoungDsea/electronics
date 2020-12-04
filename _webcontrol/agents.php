<?php 
    // require 'clean.php';
// require("../conn.php");
// include 'remove-tag.php';
    

?>
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
      if(!in_array('Store', $ex)){
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
      <div class="row">
      <div class="col-md-9 mb-3">
      <form method="post" action="category_filter" id="tarp" class="mb-3">
               <div class="col-md-6" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="storer" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
               
               <div class="col-md-3" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <div class="col-md-3"><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Create New Agent</button>
      </div>
              
             </div>
      
      <br>

      <?php
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
                } 
                $total_records_per_page = 100;

        ?>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Agents <span class="text-danger"></span></div>
          <div class="card-body">
            <div class="table-responsive" style="min-height: 200px;">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:12px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                    <th>Fullname </th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th colspan="">---</th>
                  </tr>
                </thead>
                <tbody>
<?php
 
if(isset($_GET['name']) ){
  $sname=$conn->real_escape_string($_GET['name']);

  $sqls=$conn->query("SELECT * from _security where drank='agent' AND uname LIKE '%$sname%' OR drank='agent' AND dcompany LIKE '%$sname%' OR drank='agent' AND email LIKE '%$sname%' OR drank='agent' AND dphone LIKE '%$sname%' order by id DESC ");
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;

    $site=$conn->query("SELECT * from _security where drank='agent' AND uname LIKE '%$sname%' OR drank='agent' AND dcompany LIKE '%$sname%' OR drank='agent' AND email LIKE '%$sname%' OR drank='agent' AND dphone LIKE '%$sname%' order by id DESC LIMIT $start_from, $total_records_per_page");
}else{  
    $sqls=$conn->query("SELECT * from _security where drank='agent' order by id DESC ");
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    
    $site=$conn->query("SELECT * from _security where drank='agent' order by status='online' DESC LIMIT $start_from, $total_records_per_page");
  }
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
<td><?php echo $row['uname']; ?></td>
<td><?php echo $row['dphone']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['dlocation']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php if($row['dstatus']=='unban'){ echo "Active"; }else{ echo "Inactive"; } ?></td>
<td>
<div class="btn-group">
<div class="btn-group" >
    <button type="button" style="width:100px" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
    Action <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
    <li><a class="nav-link" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>" href="#">Edit</a></li>
    <?php if($row['status']=='online'){?>
    <li><a class="nav-link" id="app" user="<?php echo $row['userid']; ?>" href="#">Approve</a></li>
    <?php } ?>
    <?php if($row['dstatus']=='ban'){?>
    <li><a class="nav-link" id="storeUn" user="<?php echo $row['userid']; ?>" href="#">Unban</a></li>
    <?php }else{ ?>
    <li><a class="nav-link" id="storeBan" user="<?php echo $row['userid']; ?>" href="#">Ban</a></li>
        <?php } ?>
    <li><a class="nav-link" id="storeDel" user="<?php echo $row['userid']; ?>" href="#">Delete</a></li>
    </ul>
</div>
</div>

</td>


</tr> 
<?php }
}else{
  echo "<tr><td colspan=5>No results Found</td></tr>";
}
?>
                                 
                </tbody>
              </table>
            </div>
          </div>


            <div class="card-footer small text-muted">
                <ul class="pagination pagination-md justify-content-center">
                    <?php


                    if(isset($_GET['name'])){
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                        // $pname = $_GET["pro_name"];
                        echo "<li  class='page-item '><a class='page-link' href='new-store?page_no=$counter&name=".$_GET['name']."' style='color:#0088cc;'>$counter</a></li>"; 

                    }
                    }else{
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                        echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 

                    }
                    }
                    ?>
				</ul>
            </div>
  
                            </div>
 
        </div>
      </div>
    <!-- DataTables Example -->

      <!-- Sticky Footer -->
     <?php include("footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create New Agent</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                             <form action="agent-process" method="post">
									<div class="form-row">
									<div class="form-group col-md-12">
										<input type="text" name="name" autocomplete="off" required class="form-control" placeholder="Your Fullname">
                                    </div>
                                    
									
									<div class="form-group col-md-12">
										<input type="email" name="email" autocomplete="off" class="form-control" placeholder="Email Address">
									</div>

									<div class="form-group col-md-12">
										<input type="text" name="phone" autocomplete="off" class="form-control" placeholder="Phone Number">
                                    </div>
                                    
                                                                        
                  <div class="form-group col-md-12">
                      
                      <div class="form-group required-field">
                          <select name="location" id="" required class="form-control form-control-sm">
                          <option value="">Choose location </option>
                          <?php $lop = $conn->query("SELECT * FROM ddelivery GROUP BY dlocation ORDER BY dlocation");
                          if($lop->num_rows>0){
                              while($ram=$lop->fetch_assoc()):?>
                                  <option value="<?php echo $ram['dlocation']; ?>"><?php echo $ram['dlocation']; ?></option>
                              <?php endwhile; } ?>
                          </select>
                    
                      </div>

                  </div>

                  <div class="form-group col-md-12">
                      <input type="text" class="form-control" placeholder="Account Name" name="account_name">
                  </div>

                  <div class="form-group col-md-12">
                      <input type="text" class="form-control" placeholder="Account Number" name="account_num">
                  </div>

                  <div class="form-group col-md-12">
                      <input type="text" class="form-control" placeholder="Bank Name" name="bank">
                  </div>

                                    <div class="form-group col-md-12">
										<textarea name="message" autocomplete="off" class="form-control" placeholder="Address" rows="2"></textarea>
									</div>

									<div class="form-group col-md-12"> 
										<input type="password" name="pass" autocomplete="off" class="form-control" placeholder="Choose Password">
									</div>


									</div>
											
									
                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


<?php
 $site=$conn->query("SELECT * from _security where drank='agent' order by id DESC ");
 if($site->num_rows>0):
    while($row=$site->fetch_assoc()):?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Agent Details</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">

                             <form action="agent-process" method="post">
									<div class="form-row">
									<div class="form-group col-md-12">
										<input type="text" name="name" value="<?php echo $row['uname']; ?>" autocomplete="off" required class="form-control" placeholder="Your Fullname">
                                    </div>
                                    
									
									<div class="form-group col-md-12">
										<input type="email" name="email" value="<?php echo $row['email']; ?>" autocomplete="off" class="form-control" placeholder="Email Address">
									</div>

									<div class="form-group col-md-12">
										<input type="text" name="phone" value="<?php echo $row['dphone']; ?>" autocomplete="off" class="form-control" placeholder="Phone Number">
                                    </div>

                                    <div class="form-group col-md-12">
                                        
                                        <div class="form-group required-field">
                                            <select name="location" id="" required class="form-control form-control-sm">
                                            <option value="">Choose location </option>
                                            <?php $lop = $conn->query("SELECT * FROM ddelivery GROUP BY dlocation ORDER BY dlocation");
                                            if($lop->num_rows>0){
                                                while($ram=$lop->fetch_assoc()):?>
                                                    <option <?php if($row['dlocation']==$ram['dlocation']) echo "selected"; ?> value="<?php echo $ram['dlocation']; ?>"><?php echo $ram['dlocation']; ?></option>
                                                <?php endwhile; } ?>
                                            </select>
                                      
                                        </div>

                                    </div>

                                   
                  
                                    
                                    <div class="form-group col-md-12">
										<textarea name="message" autocomplete="off" class="form-control" placeholder="Address" rows="2"><?php echo $row['address']; ?></textarea>
                  </div>
                  
                  <!-- <hr> -->
                  <div class="form-group col-md-12"> <hr>
                  <p>Account Details</p>
                      <input type="text" value="<?php echo $row['dacc_name']; ?>" class="form-control" placeholder="Account Name" name="acc_name">
                  </div>

                  <div class="form-group col-md-12">
                      <input type="text" class="form-control" value="<?php echo $row['dacc_number']; ?>" placeholder="Account Number" name="acc_number">
                  </div>

                  <div class="form-group col-md-12">
                      <input type="text" class="form-control" value="<?php echo $row['dbank']; ?>" placeholder="Bank Name" name="bank">
                  </div>


									</div>
                                        <input type="hidden" name="id" value="<?php echo $row['userid']; ?>" class="form-control form-control-sm" required>
                         
                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="logx" class="btn btn-primary btn-sm">Update Store</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
                                    <?php endwhile; endif; ?>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


<?php include("scripts.php"); ?>
<script>
document.querySelectorAll(".fillz").forEach(function(g){
g.addEventListener("click",function(d){
  document.querySelector("#form-id").value=d.target.dataset.id;
  document.querySelector("#form-name").value=d.target.dataset.name;
});
});
</script>
<script>
document.querySelectorAll(".delz").forEach(function(d){
d.addEventListener("click",function(g){
  document.querySelector(".delzv").href=g.target.dataset.delete_id;
});
});
</script>
</body>

</html>
