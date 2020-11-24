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
if($r['privilege']=='staff'){
  //check if staff has accessibility
  $sp = $r['privilege'];
  $ex = explode(',', $sp);
  if(!in_array('Brand', $ex)){
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
      <div class="col-md-9">
      <form method="post" action="category_filter" id="tarp">
               <div class="col-md-6" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="nameb" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
              
               <div class="col-md-3" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <div class="col-md-3"><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Brand</button>
      </div>
              
             </div>
      
      <br>

    
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Brands <span class="text-danger"><?php if(isset($_GET['start']) AND @$_GET['start'] !=0){ echo "(".$_GET['start'].")";} ?></span></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:12px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                    
                    <th>Logo </th>
                    <th>Category </th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php

if(isset($_GET['name']) ){
  $sname=$conn->real_escape_string($_GET['name']);
    $site=$conn->query("select * from brands where status='active' AND dcategory LIKE '%$sname%' OR name LIKE '%$sname%' order by id DESC LIMIT $eu, $limit");
}else{
 
    $site=$conn->query("select * from brands where status='active' order by dcategory ");
  
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
   
      
    <td>
<img src="../_brands_images/<?php echo $row['img']; ?>" style="height:50px;width:50px;" alt=""></td>
<td><?php echo $row['dcategory']; ?></td>
<td><?php echo $row['name']; ?></td>
<td>
<a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillz" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>"
> Edit</a>
</td>
<td>
<a data-delete_id="brands_delete?id=<?php echo $row['id']; ?>&img=<?php echo $row['img']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" data-target="#delete" data-toggle="modal" class="btn-danger btn-xs delz"> Delete</a>

</td>
</tr> 
<?php }
}else{
  echo "<tr><td colspan=4>No results Found</td></tr>";
}
?>
                                 
                </tbody>
              </table>
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
                <form action="brands_add" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Brand</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <!-- <div class="form-group required-field">
                                        <label>Category </label>
                                        <input type="text" name="name" class="form-control form-control-sm" required>
                                    </div> -->

                                    <div class="form-group required-field">
                                        <label>Category</label>
                                       <select name="name" class="form-control" required>
                                      <option value="">Choose Category</option>
                                      <?php
                                       $list=$conn->query("select * from categories where status='active' order by name");
                                       if($list->num_rows>=1){
                                         while($rows=$list->fetch_assoc()){ ?>
                                          <option  value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                        <?php }
                                       }
                                       ?>
                                       
                                       </select>
                                    </div>


                                    <div class="form-group required-field">
                                        <label>Brand Name </label>
                                        <input type="text" name="bname" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Brand Logo </label>
                                        <input type="file" name="img" class="form-control-file form-control-sms" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="login" class="btn btn-primary btn-sm">Add Brand</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


<?php

$site=$conn->query("select * from brands where status='active' order by name ");
if($site->num_rows>0):
  while($row=$site->fetch_assoc()):
?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="brands_update" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Brand</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <!-- <label>Category </label> -->
                                        <input type="hidden" name="id" id="form-ids" value="<?php echo $row['id']; ?>" required>
                                        <input type="hidden" name="imgb" id="form-imgs" value="<?php echo $row['img']; ?>" required>
                                        <!-- <input type="text" name="name" id="form-names" value="<?php echo $row['name']; ?>" class="form-control form-control-sm" required> -->
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Category</label>
                                       <select name="name" class="form-control" required>
                                      <option value="">Choose Category</option>
                                      <?php
                                       $list=$conn->query("select * from categories where status='active' order by name");
                                       if($list->num_rows>=1){
                                         while($rows=$list->fetch_assoc()){ ?>
                                          <option <?php if($row['dcategory']==$rows['name']){echo 'selected'; } ?> value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                        <?php }
                                       }
                                       ?>
                                       
                                       </select>
                                    </div>


                                    <div class="form-group required-field">
                                        <label>Brand Name </label>
                                        <input type="text" name="bname" value="<?php echo $row['name']; ?>"  id="form-bnames" class="form-control form-control-sm" required>
                                        <input type="hidden" name="beforename" value="<?php echo $row['name']; ?>"  id="form-bnames" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Brand Logo (Optional)</label>
                                        <input type="file" name="img" class="form-control-file form-control-sms" >
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="login" class="btn btn-primary btn-sm">Update Brand</button>
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
  document.querySelector("#form-bname").value=d.target.dataset.bname;
  document.querySelector("#form-img").value=d.target.dataset.img;
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
