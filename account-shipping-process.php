<?php
require 'conn.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['log'])){
        $shipping = $conn->real_escape_string($_POST['shipping']);
        $ship_id=date('YdmHis');
        $users = $conn->real_escape_string($_SESSION['userid']);
        
        $sqlxv=$conn->query("SELECT * FROM `dship_address` WHERE userid='$users'");
        if($sqlxv->num_rows==0){
            $sql = $conn->query("INSERT INTO `dship_address` SET userid='$users', dship_id='$ship_id', daddress='$shipping', dstatus='yes' ");
        }else{
        $sql = $conn->query("INSERT INTO `dship_address` SET userid='$users', dship_id='$ship_id', daddress='$shipping' ");
        }
        if($sql){
            $_SESSION["msgs"]="Added successfully";
            header("Location:account-shipping-address");
        }else{
            $_SESSION["msg"]="Oops!, try agin later";
            header("Location:account-shipping-address");

        }
    }else{
        $_SESSION["msg"]="Hey! do you know what your doing?";
            header("Location:account-shipping-address");
    }
}