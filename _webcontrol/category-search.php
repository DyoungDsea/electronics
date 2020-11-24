<?php 

require("../conn.php");


$out ='';
if(isset($_POST['search']) AND $_POST['search']=="Sub"){
    $category = clean_up($_POST['id']);
    $list=$conn->query("SELECT * from sub_categories where dcategory='$category' AND status='active' order by name");
    if($list->num_rows>=1){
        $out .='
      <option value="">Choose Sub Category</option>';
      while($rows=$list->fetch_assoc()){ 
      $out .='<option value="'.$rows['name'].'">'.$rows['name'].'</option>';
     }
    }
}elseif(isset($_POST['search']) AND $_POST['search']=="Brand"){
    $category = clean_up($_POST['id']);
    $list=$conn->query("SELECT * from brands where dcategory='$category' AND status='active' order by name");
    if($list->num_rows>=1){
        $out .='<option value="">Choose Brand</option>';
      while($rows=$list->fetch_assoc()){ 
      $out .='<option value="'.$rows['name'].'">'.$rows['name'].'</option>';
     }
    }
}elseif(isset($_POST['search']) AND $_POST['search']=="First"){
    $out .='<input type="number" name="one1" value="0" pattern="[0-9]" placeholder="eg 1-100" class="form-control form-control-sm" required>';
}elseif(isset($_POST['searchFirsts'])){
    $out .='<input type="number" name="one2" value="0" pattern="[0-9]" placeholder="eg 1-100" class="form-control form-control-sm" required>';
}elseif(isset($_POST['searchFirstx'])){
    $out .='<input type="number" name="one3" value="0" pattern="[0-9]" placeholder="eg 1-100" class="form-control form-control-sm" required>';
}elseif(isset($_POST['searchFirstz'])){
    $out .='<input type="number" name="one4" value="0" pattern="[0-9]" placeholder="eg 1-100" class="form-control form-control-sm" required>';
}




 echo $out;   

 function clean_up($value){
    $value=trim($value);
    $value=htmlspecialchars($value);
    $value=strip_tags($value);
    return $value;
}

?>