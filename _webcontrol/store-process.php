<?php
session_start();
require("../conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $email = clean_up($_POST['email']);
    $phone = clean_up($_POST['phone']);
    $address = clean_up($_POST['message']);
    $name = clean_up($_POST['name']);
    $store = clean_up($_POST['store']);

    if(isset($_POST['log'])){ 
        
        $userid = date("ymdhis").rand(10000, 999999);
        $pass = md5(clean_up($_POST['pass']));

        $sql=$conn->query("INSERT INTO _security SET userid='$userid', email='$email', uname='$name', dcompany='$store', pword='$pass', drank='seller', address='$address', dphone='$phone', privilege='staff', dprivilege='Product,Orders'");
        if($sql){
            $_SESSION['msgs']="Store created successfully"; 
        }else{
                $_SESSION['msgs']="Oops! try again later"; 
            }    
            header("Location: new-store");
    }elseif(isset($_POST['logx'])){
        $userid = clean_up($_POST['id']);
        $sql=$conn->query("UPDATE _security SET email='$email', uname='$name', dcompany='$store', address='$address', dphone='$phone' WHERE userid='$userid'");
        if($sql){
            $_SESSION['msgs']="Store updated successfully"; 
        }else{
                $_SESSION['msgs']="Oops! try again later"; 
            } 
        header("Location: new-store");
    }else{
        header("Location: index");
    }

}

function clean_up($value){
    $value=trim($value);
    $value=htmlspecialchars($value);
    $value=strip_tags($value);
    return $value;
}
?>