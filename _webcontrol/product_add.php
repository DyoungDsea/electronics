<?php
// error_reporting(E_ERROR | E_PARSE);
// session_start();
require("../conn.php");

if(!empty($_POST['pro_name']) && !empty($_POST['pro_description'])){ 
 function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        //$value=strip_tags($value);
        return $value;
    }

    if($_SESSION['rank']=="admin"){
        $store = 'Admin';
    }else{
        $store = "Seller";
    }

    $proid = date("ymdhis").rand(10000, 99999999);
    $userid = $_SESSION['admin'];
    $now = gmdate("Y-m-d H:i:s");
    $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

    $pro_name=clean_up($_POST['pro_name']); 
    $cat_id=clean_up($_POST['cat_id']);
    $sub=clean_up($_POST['sub']);
    $brand=clean_up($_POST['brand']);
    $display=clean_up($_POST['display']);
    $displays=clean_up($_POST['displays']);
    $discount=!empty($_POST['discount']) ? clean_up($_POST['discount']): NULL;

    $ones=!empty($_POST['ones']) ? clean_up($_POST['ones']): NULL;
    $onex=!empty($_POST['onex']) ? clean_up($_POST['onex']): NULL;
    $onez=!empty($_POST['onez']) ? clean_up($_POST['onez']): NULL;


    $pro_desc=$_POST['pro_description']; 
    $pro_descfull=$_POST['pro_descriptionfull']; 
    $pro_descriptionsp=$_POST['pro_descriptionsp']; 
    $install_price=clean_up($_POST['reg_price']); 
    $price=clean_up($_POST['price']); 
    $avaliable=clean_up($_POST['avaliable']);   

    $company = $_SESSION['company'];


    $transid=date('YmHis');

    include 'image_php/class.upload.php';
    //validate image
    if(!empty($_FILES['img']['name'])){
       
        $sku = date("ymds-sh");
        $vcode = 'NIG-'.date("ysm").'U'.date("sh").'-S';
        $query = $conn->query("INSERT INTO `products` SET dpid='$proid', dstore='$store', duserid='$userid', dcompany='$company', dvcode='$vcode', dsku='$sku', dpname='$pro_name', dcategory='$cat_id', dsub_cat='$sub', dbrand='$brand', dpdesc='$pro_desc', dldesc='$pro_descfull', dspec='$pro_descriptionsp', davaliable='$avaliable', dinstall_price='$install_price', dplan2='$ones', dplan3='$onex', dplan4='$onez', dprice='$price', ddiscount='$discount', ddisplay_opt='$display', ddisplay_opt2='$displays', created_at='$date'");
        if($query){
            insertImages($_FILES['img'], '1', $transid, $proid);
            $_SESSION['msgs']="Product was added";        
        }else{
            $_SESSION['msgs']="Product insertion failed"; 
        } 
    }

    if(!empty($_FILES['img2']['name'])){
        insertImages($_FILES['img2'], '2', $transid, $proid, '_1');
    }

    if(!empty($_FILES['img3']['name'])){
        insertImages($_FILES['img3'], '3', $transid, $proid, '_2');
    }

    if(!empty($_FILES['img4']['name'])){
        insertImages($_FILES['img4'], '4', $transid, $proid, '_3');
    }
          
header("Location: products");      
}else{
    header("Location: index");
 }

    function insertImages($fileName, $id, $transid, $gerenate_id, $add='' ){
        GLOBAL $conn;
        @list(, , $imtype, ) = getimagesize($fileName['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1'.$add;
        $foo = new Upload($fileName);  
        include("image_php/image_maker_product.php");        
        $conn->query("UPDATE `products` SET dimg$id='$picid' WHERE dpid='$gerenate_id'" );
        }
        
    }

?>

         

         