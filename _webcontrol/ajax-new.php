<?php
require '../conn.php';
$now = gmdate("Y-m-d H:i:s");
$date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

$staff_id = $conn->real_escape_string($_SESSION['admin']);
$rank = $conn->real_escape_string($_SESSION['rank']);
$reep = $conn->query("SELECT * FROM dpercent ")->fetch_assoc();

if($_SERVER['REQUEST_METHOD']=="POST"){

    $id = $conn->real_escape_string($_POST['id']);
    function sendUpdate($status, $id){
        GLOBAL $conn;
        $conn->query("UPDATE _security SET dstatus='$status' WHERE userid='$id'");
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="approveStore"){
        $conn->query("UPDATE _security SET status='offline' WHERE userid='$id'");
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="storeUn"){
        // $conn->query("UPDATE _security SET dstatus='unban' WHERE userid='$id'");
        sendUpdate('unban', $id);
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="storeBan"){
        // $conn->query("UPDATE _security SET dstatus='ban' WHERE userid='$id'");
        sendUpdate('ban', $id);
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="storeDel"){
        $conn->query("DELETE FROM _security WHERE userid='$id'");
    }

    
    if(isset($_POST['Message']) AND $_POST['Message']=="markProcess"){
        $order = $_POST['id'];
        $storeId = '';
        $subject="Your $namew Order $order has been confirmed. ";
            
        $message='Thank you for shopping on '.$namew.'! Your order '.$order.' has been successfully confirmed.'. "\r\n";

        $message .='It will be packaged and shipped as soon as possible. '. "\r\n";
        $message .='You will receive a notification from us.'. "\r\n";
        $message .='Thank you for shopping on '.$namew.'.'. "\r\n";

        $message .='Please note:';
        $message .='If you ordered for multiple items, you may receive them on different days. This is because they are sold by '. "\r\n";
        $message .='different sellers on our platform and we want to make each item available to you as soon as possible after receiving it.
        '. "\r\n";
        markResult($storeId, $order, $staff_id, $date, $message, $subject, $namew, $dcomm_email);
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="markPaid"){
        $order = $_POST['id'];
        $storeId = '';
        $subject="Your $namew Order $order has been mark as paid. ";
            
        $message='Thank you for shopping on '.$namew.'! Your order '.$order.' has been successfully mark as paid.'. "\r\n";

        $message .='It will be packaged and shipped as soon as possible. '. "\r\n";
        $message .='You will receive a notification from us.'. "\r\n";
        $message .='Thank you for shopping on '.$namew.'.'. "\r\n";

        $message .='Please note:';
        $message .='If you ordered for multiple items, you may receive them on different days. This is because they are sold by '. "\r\n";
        $message .='different sellers on our platform and we want to make each item available to you as soon as possible after receiving it.
        '. "\r\n";
        // markResult($storeId, $order, $staff_id, $date, $message, $subject, $namew, $dcomm_email);
        $up = $conn->query("UPDATE dcart SET dpayment_status='paid' WHERE orderid='$order'");
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: '.$namew.'<'.$dcomm_email.'>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";
        // $messageToSend = messageToUsers($order, '', $name, $message, $phone, $address);
        // mail($email,$subject,$messageToSend,$headers);
        if($up){
            //find the price and update store wallet
            $cat = $conn->query("SELECT * FROM dcart WHERE orderid='$order'");
            if($cat->num_rows>0){
                while($rop=$cat->fetch_assoc()){
                    $amount = (Int)$rop['dtotal'];
                    $store_id=$rop['dstore_id'];
                    $stor = $conn->query("SELECT dwallet FROM _security WHERE userid='$store_id'");
                    if($stor->num_rows>0){
                        $row = $stor->fetch_assoc();
                        $wall = (Int)$row['dwallet'];
                        $total = $amount + $wall;//total amount to pay the store
                        $conn->query("UPDATE _security SET dwallet='$total' WHERE userid='$store_id'");
                    }
                }

            }
        }

    }


    if(isset($_POST['Message']) AND $_POST['Message']=="markShip"){
        $rowId = $conn->real_escape_string($_POST['valueA']);
        $order = $conn->real_escape_string($_POST['id']);
        $status = 'dispatched';
        $trackStatus = "Mark as dispatched";
        $subject="Your $namew Order $order has been dispatched";            
        $message="Thank you for shopping on $namew! Your item(s) on $order has been dispatched. \r\n";
        $message .="You will receive a email/phone call from us as soon as it arrives. \r\n";
        $message .="Thank you for shopping on  $namew \r\n";
        $message .="Please note: \r\n";
        $message .="If you ordered for multiple items, you may receive them on different days. This is because they are sold by \r\n";
        $message .="different sellers on our platform and we want to make each item available to you as soon as possible after receiving it. \r\n";
        markResultTwo( $rowId, $status, $trackStatus, $order, $staff_id, $date, $message, $subject, $namew, $dcomm_email);

    }

    // if(isset($_POST['Message']) AND $_POST['Message']=="markShip"){
    //     $rowId = $conn->real_escape_string($_POST['valueA']);
    //     $order = $conn->real_escape_string($_POST['id']);
    //     $status = 'dispatched';
    //     $trackStatus = "Mark as dispatched";
    //     $subject="Your $namew Order $order has been dispatched";            
    //     $message="Thank you for shopping on $namew! Your item(s) on $order has been dispatched. \r\n";
    //     $message .="You will receive a email/phone call from us as soon as it arrives. \r\n";
    //     $message .="Thank you for shopping on  $namew \r\n";
    //     $message .="Please note: \r\n";
    //     $message .="If you ordered for multiple items, you may receive them on different days. This is because they are sold by \r\n";
    //     $message .="different sellers on our platform and we want to make each item available to you as soon as possible after receiving it. \r\n";
    //     markResultTwo( $rowId, $status, $trackStatus, $order, $staff_id, $date, $message, $subject, $namew, $dcomm_email);

    // }


    if(isset($_POST['Message']) AND $_POST['Message']=="markDelivered"){
        $rowId = $conn->real_escape_string($_POST['valueA']);
        $order = $conn->real_escape_string($_POST['id']);
        $status = 'delivered';
        $trackStatus = "Mark as delivered";
        $subject="Your $namew Order $order has been delivered";            
        $message="Thank you for shopping on $namew! Your item(s) on $order has been delivered. \r\n";
        $message .="You have an option to return an item within 5 days of delivery if it does not \r\n match your expectation (wrong/defective/damaged). <a href='https:$web/contact-us'>Contact Us</a>. \r\n";
        $message .="Thank you for shopping on  $namew \r\n <br><br>";
        $message .="Please note: \r\n";
        $message .="If you ordered for multiple items, you may receive them on different days. This is because they are sold by \r\n";
        $message .="different sellers on our platform and we want to make each item available to you as soon as possible after receiving it. \r\n";
        markResultTwo( $rowId, $status, $trackStatus, $order, $staff_id, $date, $message, $subject, $namew, $dcomm_email);

        if($up){
            //find the price and update store wallet
            $cat = $conn->query("SELECT * FROM dcart WHERE orderid='$order' AND id='$rowId' AND dagent_id IS NOT NULL");
            if($cat->num_rows>0){
                while($rop=$cat->fetch_assoc()){
                    $amount = (Int)$rop['dcharge'];
                    $agent_id=$rop['dagent_id'];
                    $stor = $conn->query("SELECT dwallet FROM _security WHERE userid='$store_id'");
                    if($stor->num_rows>0){
                        $row = $stor->fetch_assoc();
                        $wall = (Int)$row['dwallet'];
                        $total = $amount + $wall;//total amount to pay the store
                        $conn->query("UPDATE _security SET dwallet='$total' WHERE userid='$store_id'");
                    }
                }

            }
        }


    }

    if(isset($_POST['Message']) AND $_POST['Message']=="markReturned"){
        $rowId = $conn->real_escape_string($_POST['valueA']);
        $order = $conn->real_escape_string($_POST['id']);
        $status = 'returned';
        $trackStatus = "Mark as returned";
        $subject="Your $namew Order $order has been returned";            
        $message="Thank you for shopping on $namew! Your item(s) on $order has been returned. \r\n";
        $message .="You have an option to return an item within 5 days of delivery if it does not \r\n match your expectation (wrong/defective/damaged). <a href='https:$web/contact-us'>Contact Us</a>. \r\n";
        $message .="Thank you for shopping on  $namew \r\n <br><br>";
        $message .="Please note: \r\n";
        $message .="If you ordered for multiple items, you may receive them on different days. This is because they are sold by \r\n";
        $message .="different sellers on our platform and we want to make each item available to you as soon as possible after receiving it. \r\n";
        markResultTwo( $rowId, $status, $trackStatus, $order, $staff_id, $date, $message, $subject, $namew, $dcomm_email);

    }


    if(isset($_POST['Message']) AND $_POST['Message']=="corders"){
        $rowId = $conn->real_escape_string($_POST['valueA']);
        $order = $conn->real_escape_string($_POST['id']);
        $status = 'cancelled';
        $trackStatus = "Mark as cancelled";
        $subject="Your $namew Order $order has been cancelled";            
        $message="Thank you for shopping on $namew!. \r\n";
        $message .="We regret to inform you that your order $order was cancelled. \r\n";
        $message .="Thank you for shopping on  $namew \r\n <br><br>";
        markResultTwo( $rowId, $status, $trackStatus, $order, $staff_id, $date, $message, $subject, $namew, $dcomm_email);
        //find store and deduct the account with the total price of each item and update the account back
        // $sql = $conn->query("SELECT * FROM dcart WHERE orderid='$order'");
        // if($sql->num_rows>0){
        //     while($map=$sql->fetch_assoc()){
        //         $userid = $map['dcart'];
        //         $store_id = $map['dstore_id'];
        //         $total = $map['dtotal'];
        //         $stay = $conn->query("SELECT dwallet FROM _security WHERE ");

        //     }
        // }

    }






}












function markResultTwo( $rowId, $status, $trackStatus, $order, $staff_id, $staff_date, $messageType, $subject, $namew, $dcomm_email){
    GLOBAL $conn;
        $id = $conn->real_escape_string($rowId);
        $order = $conn->real_escape_string($order);
        $d = $conn->query("SELECT * FROM login INNER JOIN dcart ON login.userid=dcart.userid WHERE dcart.orderid='$order'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $phone = $d['dphone'];
        $address = $d['daddress'];

        $up = $conn->query("UPDATE dcart SET dorder_status='$status' WHERE orderid='$order' AND id='$id'");
            
        if($up){
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='$trackStatus', ddate='$staff_date' ");
            // $subject="Your $namew Order $order has been confirmed. ";            
            $message=$messageType;
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: '.$namew.'<'.$dcomm_email.'>' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";
            $messageToSend = messageToUsers($order, $id, $name, $message, $phone, $address);
            mail($email,$subject,$messageToSend,$headers);
        }
}



function markResult( $storeId, $order, $staff_id, $staff_date, $messageType, $subject, $namew, $dcomm_email){
    GLOBAL $conn;
        $user = $conn->real_escape_string($storeId);
        $order = $conn->real_escape_string($order);
        $d = $conn->query("SELECT * FROM login INNER JOIN dcart ON login.userid=dcart.userid WHERE dcart.orderid='$order'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $phone = $d['dphone'];
        $address = $d['daddress'];
        $user;//not in use but for future
        $up = $conn->query("UPDATE dcart SET dorder_status='confirmed' WHERE orderid='$order'");
            
        if($up){
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as confirmed', ddate='$staff_date' ");
            // $subject="Your $namew Order $order has been confirmed. ";            
            $message=$messageType;
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: '.$namew.'<'.$dcomm_email.'>' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";
            $messageToSend = messageToUsers($order, '', $name, $message, $phone, $address);
            mail($email,$subject,$messageToSend,$headers);
        }
}



// We are happy to inform you that we have initiated the refund of your order 387938765, for ₦ 2,499 into your JumiaPay account. It should appear in your JumiaPay wallet within 24 hours. 
// Please note: 

// If you have used a voucher as means of payment or requested for your refund to be processed to a voucher, you will receive an email with the new voucher within 24 hours. You can use the voucher code to purchase any item on the Jumia NG website. Click here to learn how to pay on Jumia using vouchers.

// If you have used a GTB or Zenith credit/debit card, Your refund will be processed into your card. It may take up to 5-7 business days for your bank to credit the refund amount to your account.

// All other payment instrument goes into your JumiaPay Account. It should appear in your JumiaPay wallet within 24 hours.

// You can use the money in your wallet to buy on Jumia Nigeria right away. Just choose to pay by "JumiaPay" at checkout and the value in the wallet will be deducted for your next purchase. 
// Otherwise, you can withdraw your money by clicking JumiaPay. 
// For more details, please check our JumiaPay refund page. 
// We hope to see you shop on Jumia soon! We received a return request for the following item(s):