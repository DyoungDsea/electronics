<?php
require 'conn.php';

$users = $conn->real_escape_string($_SESSION['userid']);
$row = $conn->query("SELECT * FROM login WHERE userid='$users'")->fetch_assoc();
$username = $row['dname'];
$email = $row['demail'];
$phone = $row['dphone'];
$address = $row['daddress'];
if(isset($_POST['Delete'])){
    $id = $conn->real_escape_string($_POST['id']);
    $conn->query("DELETE FROM dship_address WHERE dship_id='$id' AND userid='$users'");
}


if(isset($_POST['Default'])){
    $id = $conn->real_escape_string($_POST['id']);
    //select all user address and update to no then update default setting
    $kop = $conn->query("SELECT * FROM dship_address WHERE userid='$users'");
    if($kop->num_rows>0){
        $conn->query("UPDATE dship_address SET dstatus='no' WHERE userid='$users'");
        $conn->query("UPDATE dship_address SET dstatus='yes' WHERE dship_id='$id' AND userid='$users'");
    }
}

if(isset($_POST['Message']) AND $_POST['Message']=="Remover"){
    $id = $conn->real_escape_string($_POST['id']);
    $conn->query("DELETE FROM `dcart` WHERE orderid='$id' AND userid='$users'");
}



if(isset($_POST['Message']) AND $_POST['Message']=="Cancelr"){
    $id = $conn->real_escape_string($_POST['id']);
    $conn->query("UPDATE dcart SET dpayment_status='cancelled', dorder_status='cancelled'  WHERE orderid='$id' AND userid='$users'");

    $subject="Your $namew Order $order has been cancelled";            
    $message="Thank you for shopping on $namew!. \r\n";
    $message .="We regret to inform you that your order $order was cancelled. \r\n";
    $message .="Thank you for shopping on  $namew \r\n <br><br>";
    // $message=$messageType;
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= 'From: '.$namew.'<'.$dcomm_email.'>' . "\r\n";
    $messageToSend = messageToUsers($id, '', $username, $message, $phone, $address);
    mail($email,$subject,$messageToSend,$headers);

}



// 4. Cancel (Cancel Item)
// Dear Name,
// Thank you for shopping on SiteName! We regret to inform you that your order was cancelled.

// Please note:
// If you ordered for multiple items, you may receive them on different days. This is because they are sold by different sellers on our platform and we want to make each item available to you as soon as possible after receiving it.