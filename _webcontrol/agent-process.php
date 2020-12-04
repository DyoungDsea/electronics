<?php
session_start();
require("../conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $email = clean_up($_POST['email']);
    $phone = clean_up($_POST['phone']);
    $address = clean_up($_POST['message']);
    $name = clean_up($_POST['name']);
    $location = clean_up($_POST['location']);
    $acc_number = clean_up($_POST['acc_number']);
    $acc_name = clean_up($_POST['acc_name']);
    $bank = clean_up($_POST['bank']);

    if(isset($_POST['log'])){ 
        
        $userid = date("ymdhis").rand(10000, 999999);
        $pass = md5(clean_up($_POST['pass']));

        $sql=$conn->query("INSERT INTO _security SET userid='$userid', email='$email', dlocation='$location', uname='$name', pword='$pass', drank='agent', address='$address', dphone='$phone', privilege='staff', dprivilege='agent', dbank='$bank', dacc_name='$acc_name', dacc_number='$acc_number' ");
        if($sql){
            $_SESSION['msgs']="Agent created successfully"; 
        }else{
                $_SESSION['msgs']="Oops! try again later"; 
            }    
            header("Location: agents");
    }elseif(isset($_POST['logx'])){
        $userid = clean_up($_POST['id']);
        $sql=$conn->query("UPDATE _security SET email='$email', dlocation='$location', uname='$name', address='$address', dphone='$phone', dacc_name='$acc_name', dacc_number='$acc_number' WHERE userid='$userid'");
        if($sql){
            $_SESSION['msgs']="Store updated successfully"; 
        }else{
                $_SESSION['msgs']="Oops! try again later"; 
            } 
        header("Location: agents");
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