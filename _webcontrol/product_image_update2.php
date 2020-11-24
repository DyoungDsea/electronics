<?php
error_reporting(E_ERROR | E_PARSE);
// session_start();
require("../conn.php");
include("class.upload.php");
if(isset($_POST['log'])){
    
    $proid=$conn->real_escape_string($_POST['id']);
    //  die();
    $foldie=!empty($_POST['oldfirst']) ? $_POST['oldfirst'] : "";
    $soldie=!empty($_POST['oldsecond']) ? $_POST['oldsecond'] : "";
    $toldie=!empty($_POST['oldthird']) ? $_POST['oldthird'] : "";
    $loldie=!empty($_POST['oldlast']) ? $_POST['oldlast'] : "";

    $transid=date('YmHis');
    // include 'image_php/class.upload.php';
    //validate image
    
    if(!empty($_FILES['first']['name'])){
        insertImages($_FILES['first'], '1', $transid, $proid);
        unlink("../_product_images/".$foldie.'.jpg'); 
    }

    if(!empty($_FILES['second']['name'])){ 
        insertImages($_FILES['second'], '2', $transid, $proid, '_1');   
        unlink("../_product_images/".$soldie.'.jpg');
    }

    if(!empty($_FILES['third']['name'])){
        insertImages($_FILES['third'], '3', $transid, $proid, '_2');
        unlink("../_product_images/".$toldie.'.jpg');
    }

    if(!empty($_FILES['last']['name'])){
        insertImages($_FILES['last'], '4', $transid, $proid, '_3');
        unlink("../_product_images/".$loldie.'.jpg');
    }

if($up){
    $_SESSION['msgs']="Success! Image Updated";
    echo "<script>history.back();</script>";
}else{
    $_SESSION['msgs']="Image Update Failed";
    echo "<script>history.back();</script>";
}
} 


function insertImages($fileName, $id, $transid, $gerenate_id, $add='' ){
    GLOBAL $conn, $up;
    @list(, , $imtype, ) = getimagesize($fileName['tmp_name']); 
    if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
    $picid=$transid.'-1'.$add;
    $foo = new Upload($fileName);  
    include("image_php/image_maker_product.php");        
    $up = $conn->query("UPDATE `products` SET dimg$id='$picid' WHERE dpid='$gerenate_id'" );
    }
    
}



function clean_up($value){
    $value=trim($value);
    $value=htmlspecialchars($value);
    //$value=strip_tags($value);
    return $value;
}

?>
