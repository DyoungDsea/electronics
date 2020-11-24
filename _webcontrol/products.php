<?php 
    // require 'clean.php';
// require("../conn.php");
// include 'remove-tag.php';
    
function clean_reals($value){
  // require("../conn.php");
  GLOBAL $conn;
    $value=trim($value);
    $value=htmlspecialchars($value);
    $value=strip_tags($value);
    $value = $conn->real_escape_string($value);
    return $value;                
}
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
        $sp = $r['dprivilege'];
        $ex = explode(',', $sp);
        if(!in_array('Product', $ex)){
          header("Location:index");

        } 

      } ?>

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
      <form method="post" action="product_filter" id="tarp">
               <div class="col-md-6" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" required name="pro_name" value="<?php if(isset($_GET['pro_name'])){echo $_GET['pro_name'];} ?>" class="form-control it">
                 </div>
               
               </div>
               <div class="col-md-3 text-right" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <div class="col-md-3 "><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Product</button>
      </div>
              
             </div>
      
      <br>


 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Products <span class="text-danger"></span></div>
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
                  <th> Image</th>
                    <th> Name</th>
                    <th> Description</th>
                    <th>One-off Price</th>
                    <th>Installment Price</th>
                    <th>Item Code</th>
                    <th>Category </th>
                    <th>Sub Category </th>
                    <th>Date Created</th>
                    <th colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                
<?php
//  $per_page=4;

if($r['drank']=="seller"){
    $userid = $r['userid'];
    $site=$conn->query("SELECT * from  products where duserid='$userid' order by id desc ");
}else{

  if(isset($_GET['pro_name'])){
    $sname=clean_reals($_GET['pro_name']);
    
      $site=$conn->query("SELECT * from  products where dpname LIKE '%$sname%' OR dpdesc LIKE '%$sname%' OR dpid LIKE '%$sname%'OR dcategory LIKE '%$sname%' OR dsub_cat LIKE '%$sname%' OR dsku LIKE '%$sname%' order by id DESC LIMIT $eu, $limit");
    
  }else{
    
      $site=$conn->query("SELECT * from  products order by id desc ");
    
  }
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
    <td><img style="height:50px;width:50px;" src="../_product_images/<?php echo $row['dimg1']; ?>" alt=""></td>
    <td><?php echo $row['dpname']; ?></td>
    <td title="<?php echo remove_tags($row['dpdesc']); ?>"><?php echo substr(remove_tags($row['dpdesc']),0,30); ?>....</td>
    <td>&#8358;<?php echo number_format($row['dprice'],2); ?></td>
    <td>&#8358;<?php echo number_format($row['dinstall_price'],2); ?></td>
    <td><?php echo $row['dsku']; ?></td>
    <td><?php echo $row['dcategory']; ?></td>
    <td><?php echo $row['dsub_cat']; ?></td>
    <td><?php echo read_able($row['created_at']); ?></td>
          <td class="nav-item dropdown" style="padding:0;">
              <a  style="padding:7px;" class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>More</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <!-- <h6 class="dropdown-header">Login Screens:</h6> -->
                <a class="dropdown-item btn-xs fillzx" style="cursor:pointer;" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>"
                > Edit</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item btn-xs fillz2" style="cursor:pointer;" data-toggle="modal" data-target="#view"
                data-id="<?php echo $row['id']; ?>"
                > View Product</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item btn-xs fillz3" style="cursor:pointer;" data-toggle="modal" data-target="#view2" data-id="<?php echo $row['dpid']; ?>" class="dropdown-item"> Edit Product Images</a>
             
                <div class="dropdown-divider"></div>
                <a data-delete_id="product_delete?id=<?php echo $row['dpid']; ?>&img=<?php echo $row['dimg1']; ?>&img1=<?php echo $row['dimg2']; ?>&img2=<?php echo $row['dimg3']; ?>&img3=<?php echo $row['dimg4']; ?>" style="cursor:pointer;" class="dropdown-item delz" data-target="#delete" data-toggle="modal"> Delete</a>
              </div>
            </td>
    </tr> 
<?php }
}else{
  echo "<tr><td colspan=11>No results Found</td></tr>";
}
?>

                                 
                </tbody>
              </table>
            </div>
          </div>
          
         
          <!-- Updated Last at :  -->
 
 
        </div>
      </div>
    <!-- DataTables Example -->

      <!-- Sticky Footer -->
     <?php include("footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <div class="modal fade" id="view2" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:700px;">
            <div class="modal-content">
                <form action="product_image_update2" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Image</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body updating">

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
  <!-- Modal -->

  <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:900px;">
            <div class="modal-content">
                <form action="product_add" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Product Information</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body viewing">
                   
              

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
  <!-- Modal -->
  
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:600px;">
            <div class="modal-content">
                <form action="product_add" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Product</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   
                                    <div class="row">
                                    

                                    <div class="col-md-6">
                                      <div class="form-group required-field">
                                          <label>Product Category</label>
                                        <select name="cat_id" class="form-control form-control-sm" id="category">
                                        <option value="">Choose Category</option>
                                        <?php
                                        $list=$conn->query("select * from categories where status='active' order by name");
                                        if($list->num_rows>=1){
                                          while($row=$list->fetch_assoc()){ ?>
                                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                          <?php }
                                        }
                                        ?>
                                        
                                        </select>
                                      </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                          <label>Sub Category</label>
                                          <select name="sub" class="form-control form-control-sm" id="sub" required>
                                          <option value="">Choose Sub Category</option>                                         
                                          
                                          </select>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row" id="groups"></div>

                                    <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group required-field">
                                          <label>Product Name</label>
                                          <input type="text" placeholder="Product name/Title" name="pro_name" class="form-control form-control-sm" required>
                                      </div>
                                    </div>


                                      <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label>Brand</label>
                                          <select name="brand" class="form-control form-control-sm" id="brand" required>
                                          <option value="">Choose Brand</option>                                         
                                          
                                          </select>
                                        </div>
                                      </div>
                                    </div>

                                    

                                   
                                    <div class="form-group required-field">
                                        <label>Product Short Description</label>
                                        <textarea id="ckeditorxx" class="form-control ckeditor" placeholder="Product Short Description here.." name="pro_description" cols="30" rows="4"></textarea>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Product full Description</label>
                                        <textarea id="ckeditorxx" class="form-control ckeditor" placeholder="Product full Description here.." name="pro_descriptionfull" cols="30" rows="4"></textarea>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Product Specification</label>
                                        <textarea id="ckeditorxx" class="form-control ckeditor" placeholder="Product Specification here.." name="pro_descriptionsp" cols="30" rows="4"></textarea>
                                    </div>
                                   

                                   
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group required-field">
                                          <label>Display  1</label>
                                          <select name="display" class="form-control form-control-sm" required >
                                            <option value="">Choose Display 1</option>
                                            <option value="Bestsellers">Bestsellers</option>
                                            <option value="Popular">Popular</option>
                                            <option value="featured">featured</option>
                                            <option value="Special Offer">Special Offer</option>
                                                                              
                                          </select>
                                        </div>
                                      </div>

                                      <div class="col-md-4">
                                        <div class="form-group required-field">
                                          <label>Display  2</label>
                                          <select name="displays" class="form-control form-control-sm" required >
                                            <option value="">Choose Display 2</option>
                                            <option value="None">None</option>
                                            <option value="Hot">Hot</option>
                                            <option value="New">New</option>
                                                                              
                                          </select>
                                        </div>
                                      </div>

                                      <div class="col-md-4">
                                          <div class="form-group required-field">
                                            <label>Avaliability</label>
                                            <select name="avaliable" class="form-control form-control-sm">
                                              <option value="">Choose Avaliability</option>
                                              <option value="In-Stock">In-Stock</option>
                                              <option value="Out-of-stock">Out-of-stock</option>
                                                                                
                                            </select>
                                          </div>
                                      </div>

                                    </div>

                                    
                                    <div class="form-group required-field">
                                    <div class="row">
                                    <div class="col-md-4">
                                    <label>Total Installment (&#8358;)</label>
                                        <input type="number" placeholder="25000" name="reg_price" pattern="[0-9]" class="form-control form-control-sm" required>
                                    </div>                                    

                                    <div class="col-md-4">
                                    <label>One-off Price (&#8358;)</label>
                                        <input type="number" placeholder="20000" name="price" pattern="[0-9]" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="col-md-4">
                                      <label>Discount (%)</label>
                                      <select name="discount" id="" class="form-control form-control-sm" required>
                                      <option value="">Choose Discount</option>
                                        <?php
                                        for($i=0; $i<=100; $i++){?>
                                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php  } ?>
                                      </select>
                                    </div>
  
                                    </div> 

                                    </div>  



                                    <label for="x">Installment Plan(s)</label>
                                    <div class="row form-inline">
                                    
                                      <div class="col-md-4">
                                        <div class="form-check mb-2 mr-sm-2">
                                          <input class="form-check-input" value="Three Month"  name='ones' type="checkbox" id="inlineFormChecks">
                                          <label class="form-check-label" for="inlineFormChecks">
                                            Three Month
                                          </label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                        <div class="form-check mb-2 mr-sm-2">
                                          <input class="form-check-input" value="Six Month"  name='onex' type="checkbox" id="inlineFormCheckx">
                                          <label class="form-check-label" for="inlineFormCheckx">
                                            Six Month
                                          </label>
                                        </div>
                                       
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-check mb-2 mr-sm-2">
                                          <input class="form-check-input" value="One Year"  name='onez' type="checkbox" id="inlineFormCheckz">
                                          <label class="form-check-label" for="inlineFormCheckz">
                                            One Year
                                          </label>
                                        </div>
                                       
                                      </div>

                                    
                                    </div>



                                    
                                    <div class="form-group required-field">
                                        <label>Product Image<span style="color:#0088cc;">(First images is Important)</span></label><br>
                                        <div class="row">
                                        <div class="col-md-6">
                                        <div class="file-field input-field" style="margin-top:20px;">
                                        <input type="file" required name="img" required>
                                        
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                        <div class="file-field input-field" style="margin-top:20px;">
                                        <input type="file" name="img2">
                                        
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                        <div class="file-field input-field" style="margin-top:20px;">
                                        <input type="file" name="img3">
                                        
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                        <div class="file-field input-field" style="margin-top:20px;">
                                        <input type="file" name="img4">
                                        
                                        </div>
                                        </div>
                                        </div>

                                    </div>

                                    


                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Add Product</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


<?php 


$sitex=$conn->query("select * from  products order by id desc");
if($sitex->num_rows>0):
  while($v = $sitex->fetch_assoc()):

?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $v['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width:600px;">
            <div class="modal-content">
                <form action="product_update" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Product</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                                                       
                                     
                                    <div class="row">

                                    <div class="col-md-6">
                                      <div class="form-group required-field">
                                          <label>Product Category</label>                                          
                                        <select name="cat_id" class="form-control form-control-sm" id="categoryup">
                                        <option value="">Choose Category</option>
                                        <?php
                                        $list=$conn->query("select * from categories where status='active' order by name");
                                        if($list->num_rows>=1){
                                          while($row=$list->fetch_assoc()){ ?>
                                            <option idx="<?php echo $v['id']; ?>" <?php if($v['dcategory']== $row['name']){ echo 'selected'; }?>  value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                          <?php } 
                                        }
                                        ?>                                        
                                        </select>
                                      </div>
                                    </div>


                                      <div class="col-md-6">
                                        <div class="form-group required-field">
                                          <label>Sub Category</label>
                                          <select name="sub" class="form-control form-control-sm" id="subs<?php echo $v['id']; ?>" required>
                                          <option value="">Choose Sub Category</option>                                         
                                          <?php
                                          $categ =$v['dcategory'];
                                          $list=$conn->query("SELECT * from sub_categories where dcategory='$categ' AND status='active' order by name");
                                          if($list->num_rows>=1){
                                            while($rows=$list->fetch_assoc()){ ?>
                                           <option <?php if($v['dsub_cat']== $rows['name']){ echo 'selected'; }?> value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>';
                                         <?php  }
                                          }


                                          ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                      <div class="form-group required-field">
                                          <label>Product Name</label>
                                        <input type="hidden" name="id" id="form-ids" value="<?php echo $v['dpid']; ?>" required>
                                        <input type="text" name="pro_name" id="form-pro_name" value="<?php echo $v['dpname']; ?>" class="form-control form-control-sm" required>
                                      </div>
                                    </div>

                                      <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label>Brand</label>
                                          <select name="brand" class="form-control form-control-sm" id="brands<?php echo $v['id']; ?>" required>
                                          <option value="">Choose Brand</option>                                         
                                          <?php
                                          $list=$conn->query("SELECT * from brands where dcategory='$categ' AND status='active' order by name");
                                          if($list->num_rows>=1){
                                            while($rows=$list->fetch_assoc()){ ?>
                                              <option <?php if($v['dbrand']== $rows['name']){ echo 'selected'; }?> value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>';
                                        <?php   }
                                          }

                                          ?>  
                                          </select>
                                        </div>
                                      </div>
                                    </div>


                                    <div class="form-group required-field">
                                        <label>Product short Description</label>
                                        <textarea id="ckeditorxx" class="form-control ckeditor" placeholder="Product Description here.." name="pro_description" cols="30" rows="4"><?php echo $v['dpdesc']; ?></textarea>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Product full Description</label>
                                        <textarea id="ckeditorxx" class="form-control ckeditor" placeholder="Product Description here.." name="pro_descriptionfull" cols="30" rows="4"><?php echo $v['dldesc']; ?></textarea>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Product Specification</label>
                                        <textarea id="ckeditorxx" class="form-control ckeditor" placeholder="Product Description here.." name="pro_descriptionsp" cols="30" rows="4"><?php echo $v['dspec']; ?></textarea>
                                    </div>

                                    
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group required-field">
                                          <label>Display 1</label>
                                          <select name="display" class="form-control form-control-sm"  >
                                            <option value="">Choose Display Option</option>
                                            <option <?php if($v['ddisplay_opt']== "Bestsellers"){ echo 'selected'; }?>  value="Bestsellers">Bestsellers</option>
                                            <option <?php if($v['ddisplay_opt']== "Popular"){ echo 'selected'; }?>  value="Popular">Popular</option>
                                            <option <?php if($v['ddisplay_opt']== "featured"){ echo 'selected'; }?>  value="featured">featured</option>
                                            <option <?php if($v['ddisplay_opt']== "Special Offer"){ echo 'selected'; }?>  value="Special Offer">Special Offer</option>
                                                                              
                                          </select>
                                        </div>
                                      </div>

                                     

                                      <div class="col-md-4">
                                        <div class="form-group required-field">
                                          <label>Display  2</label>
                                          <select name="displays" class="form-control form-control-sm" required >
                                            <option value="">Choose Display 2</option>
                                            <option <?php if($v['ddisplay_opt2']== "None"){ echo 'selected'; }?> value="None">None</option>
                                            <option <?php if($v['ddisplay_opt2']== "Hot"){ echo 'selected'; }?> value="Hot">Hot</option>
                                            <option <?php if($v['ddisplay_opt2']== "New"){ echo 'selected'; }?> value="New">New</option>
                                            <option <?php if($v['ddisplay_opt2']== "Deal"){ echo 'selected'; }?> value="Deal">New Deal</option>
                                                                              
                                          </select>
                                        </div>
                                      </div>

                                      
                                    <div class="col-md-4">
                                        <div class="form-group required-field">
                                          <label>Avaliability</label>
                                          <select name="avaliable" class="form-control form-control-sm">
                                            <option value="">Choose Avaliability</option>
                                            <option  <?php if($v['davaliable']== "In-Stock"){ echo 'selected'; }?>  value="In-Stock">In-Stock</option>
                                            <option  <?php if($v['davaliable']== "Out-of-stock"){ echo 'selected'; }?>  value="Out-of-stock">Out-of-stock</option>
                                                                              
                                          </select>
                                        </div>
                                    </div>

                                      
                                    </div>
                                   
                                    <div class="form-group required-field">
                                    <div class="row">
                                    <div class="col-md-4">
                                    <label>Installment Price (&#8358;)</label>
                                        <input type="number" placeholder="25000" value="<?php echo $v['dinstall_price']; ?>" name="reg_price" pattern="[0-9]" class="form-control form-control-sm" required>
                                    </div>                                    

                                    <div class="col-md-4">
                                    <label>One-off Price (&#8358;)</label>
                                        <input type="number" placeholder="20000" value="<?php echo $v['dprice']; ?>" name="price" pattern="[0-9]" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="col-md-4">
                                          <label>Discount (%)</label>
                                          
                                      <select name="discount" id="" class="form-control form-control-sm" required>
                                      <option value="">Choose Discount</option>
                                        <?php
                                        for($i=0; $i<=100; $i++){?>
                                          <option <?php if($i==$v['ddiscount']){echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php  } ?>
                                      </select>
                                    

                                      </div>
                                        
                                    </div>                                                                         
                                    </div> 

                                    <label for="x">Installment Plan(s)</label>
                                    <div class="row form-inline">
                                    
                                      <div class="col-md-4">
                                        <div class="form-check mb-2 mr-sm-2">
                                          <input class="form-check-input" <?php if($v['dplan2']== "Three Month"){ echo 'checked'; }?> value="Three Month"  name='ones' type="checkbox" id="inlineFormChecks">
                                          <label class="form-check-label" for="inlineFormChecks">
                                            Three Month
                                          </label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                        <div class="form-check mb-2 mr-sm-2">
                                          <input class="form-check-input" value="Six Month" <?php if($v['dplan3']== "Six Month"){ echo 'checked'; }?>  name='onex' type="checkbox" id="inlineFormCheckx">
                                          <label class="form-check-label" for="inlineFormCheckx">
                                            Six Month
                                          </label>
                                        </div>
                                       
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-check mb-2 mr-sm-2">
                                          <input class="form-check-input" <?php if($v['dplan4']== "One Year"){ echo 'checked'; }?> value="One Year"  name='onez' type="checkbox" id="inlineFormCheckz">
                                          <label class="form-check-label" for="inlineFormCheckz">
                                            One Year
                                          </label>
                                        </div>
                                       
                                      </div>

                                    
                                    </div> 
                                    
                       
                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update Product</button>
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
  document.querySelector("#form-pro_name").value=d.target.dataset.pro_name;
  document.querySelector("#form-old_image").value=d.target.dataset.pro_img;
 CKEDITOR.instances['ckeditor2'].setData(d.target.dataset.pro_description);
  document.querySelector("#form-reg_price").value=d.target.dataset.reg_price;
  document.querySelector("#form-sub_price").value=d.target.dataset.sub_price;
  document.querySelector("#form-per_month").value=d.target.dataset.per_month;
  document.querySelector("#form-per_month").value=d.target.dataset.cate_id;
//  document.querySelector("#form-cat_id").selectedIndex=parseInt(d.target.dataset.cat_id);
});
});
$(".fillz2").each(function(){
  $(this).on("click",function(h){
$.ajax({
url:"product_serve.php",
type:"POST",
data:{id:h.target.dataset.id},
success:function(result){
  $('.viewing').html(result);
}
});
});
});
$(".fillz3").each(function(){
  $(this).on("click",function(h){
$.ajax({
url:"product_image_update.php",
type:"POST",
data:{id:h.target.dataset.id},
success:function(result){
  $('.updating').html(result);
}
});
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


