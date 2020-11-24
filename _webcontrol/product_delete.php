<?php
// session_start();
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $img=$_GET['img'];
        $img1=$_GET['img1'];
        $img2=$_GET['img2'];
        $img3=$_GET['img3'];

        
        $query=$conn->prepare("DELETE from products where dpid=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            @unlink("../_product_images/".$img.'.jpg');
            @unlink("../_product_images/".$img1.'.jpg');
            @unlink("../_product_images/".$img2.'.jpg');
            @unlink("../_product_images/".$img3.'.jpg');
            $_SESSION['msgs']="Product was deleted";           
        }else{
            $_SESSION['msgs']="Product deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>