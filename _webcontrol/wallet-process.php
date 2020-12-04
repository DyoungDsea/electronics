<?php
session_start();
require("../conn.php");
$userid = $conn->real_escape_string($_SESSION['userid']);
$fname = $conn->real_escape_string($_SESSION['name']);


if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['request'])){
        $amount = $conn->real_escape_string($_POST['amount']);
        $bal = $conn->real_escape_string($_POST['wallet']);
        $with = date("ymdhis").rand(10000, 999999);
        $now = gmdate("Y-m-d H:i:s");
        $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

        //calculate if
        $final =(Int)($bal) - (Int)($amount);
        $sql = $conn->query("INSERT INTO dwithdrawal SET dwithid='$with', userid='$userid', dname='$fname', damount='$amount', ddate='$date'");
        if($sql){
            //update user account with final balance
            $conn->query("UPDATE _security SET dwallet='$final' WHERE userid='$userid'");
            $_SESSION['report']='<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 18px; margin-bottom:20px">
            <b>Congratulations!</b> your request to withdraw &#8358;'.number_format($amount).' has been submitted. Admin needs to approve your request before the money will be pay to your account. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }else{
            $_SESSION['report']='<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 18px; margin-bottom:20px">
            <b>Oops!</b> your request to withdraw &#8538;'.number_format($amount).'fail, try again later. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

        header("Location: my-wallet");
    }
}
