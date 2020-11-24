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
      if(!in_array('Category', $ex)){
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
                   <input type="text" placeholder="Search For" name="name" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
               
               <div class="col-md-3" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <div class="col-md-3"><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Category</button>
      </div>
              
             </div>
      
      <br>


 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Categories <span class="text-danger"><?php if(isset($_GET['start']) AND @$_GET['start'] !=0){ echo "(".$_GET['start'].")";} ?></span></div>
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
                    <th>Category Name</th>
                    <!-- <th>Date Created</th> -->
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php
 $per_page=10;
 if(isset($_GET['name']) ){
  $sname=$conn->real_escape_string($_GET['name']);
  $count_all=$conn->query("select count(*) from categories where status='active' AND name LIKE '%$sname%' OR name LIKE '%$sname%'");
  $counter=$conn->query("select * from categories where status='active' AND name LIKE '%$sname%' OR name LIKE '%$sname%'");
  
  $nume=$counter->num_rows;
 }else{
  $count_all=$conn->query("select count(*) from categories WHERE status='active'");
  $counter=$conn->query("select * from categories where status='active'");
  
  $nume=$counter->num_rows;
 }



if(isset($_GET['name']) ){
  $sname=$conn->real_escape_string($_GET['name']);
    $site=$conn->query("select * from categories where status='active' AND name LIKE '%$sname%' order by id DESC ");
}else{
    
    $site=$conn->query("select * from categories where status='active' order by name");
  
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
<td><?php echo $row['name']; ?></td>
<td>
<a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillz" data-toggle="modal" data-target="#edit"
data-id="<?php echo $row['id']; ?>"
data-name="<?php echo $row['name']; ?>"
> Edit</a>

</td>
<td>

<a data-delete_id="category_delete?id=<?php echo $row['id']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" data-target="#delete" data-toggle="modal" class="btn-danger btn-xs delz"> Delete</a>

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
                <form action="category_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Category </label>
                                        <input type="text" name="name" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Add Category</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->



      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="category_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Category </label>
                                        <input type="hidden" name="id" id="form-id" class="form-control form-control-sm" required>
                                        <input type="text" name="name" id="form-name" class="form-control form-control-sm" required>
                                        <input type="hidden" name="names" id="form-names" class="form-control form-control-sm" >
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update Category</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

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
  document.querySelector("#form-names").value=d.target.dataset.name;
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
