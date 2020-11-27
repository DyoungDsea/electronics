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
        $subject="Your $web Order $order has been confirmed. ";
            
        $message='Thank you for shopping on '.$web.'! Your order '.$order.' has been successfully confirmed.'. "\r\n";

        $message .='It will be packaged and shipped as soon as possible. '. "\r\n";
        $message .='You will receive a notification from us.'. "\r\n";
        $message .='Thank you for shopping on '.$web.'.'. "\r\n";

        $message .='Please note:';
        $message .='If you ordered for multiple items, you may receive them on different days. This is because they are sold by '. "\r\n";
        $message .='different sellers on our platform and we want to make each item available to you as soon as possible after receiving it.
        '. "\r\n";
        markResult($storeId, $order, $staff_id, $date, $message, $subject, $web, $dcomm_email);
    }



    if(isset($_POST['Message']) AND $_POST['Message']=="markShip"){
        $rowId = $conn->real_escape_string($_POST['valueA']);
        $order = $conn->real_escape_string($_POST['id']);
        $status = 'dispatched';
        $trackStatus = "Mark as dispatched";

        $subject="Your $web Order $order has been dispatched.";
            
        $message='Thank you for shopping on '.$web.'! Your item(s) on '.$order.' has been dispatched.'. "\r\n";
        $message .='You will receive a notification from us as soon as it arrives.'. "\r\n";
        $message .='Thank you for shopping on '.$web.'.'. "\r\n";

        $message .='Please note:'. "\r\n";
        $message .='If you ordered for multiple items, you may receive them on different days. This is because they are sold by '. "\r\n";
        $message .='different sellers on our platform and we want to make each item available to you as soon as possible after receiving it.
        '. "\r\n";

        markResultTwo( $rowId, $status, $trackStatus, $order, $staff_id, $staff_date, $messageType, $subject, $web, $dcomm_email);

        

    }


}



















function markResultTwo( $rowId, $status, $trackStatus, $order, $staff_id, $staff_date, $messageType, $subject, $web, $dcomm_email){
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
            // $subject="Your $web Order $order has been confirmed. ";            
            $message=$messageType;
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: '.$web.'<'.$dcomm_email.'>' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";
            $messageToSend = messageToUsers($order, $name, $message, $phone, $address);
            mail($email,$subject,$messageToSend,$headers);
        }
}



function markResult( $storeId, $order, $staff_id, $staff_date, $messageType, $subject, $web, $dcomm_email){
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
            // $subject="Your $web Order $order has been confirmed. ";            
            $message=$messageType;
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: '.$web.'<'.$dcomm_email.'>' . "\r\n";
            // $headers .= 'Cc: myboss@example.com' . "\r\n";
            $messageToSend = messageToUsers($order, $name, $message, $phone, $address);
            mail($email,$subject,$messageToSend,$headers);
        }
}


function messageToUsers($order, $username, $messageSend, $phone, $address){
    GLOBAL $conn;

$message = '
<html>
<head>

<style>
.box{
    /* padding: 20px; */
    border: 1px solid grey;
    margin: 40px;
}

.box-header {
    margin: 20px 0;
    border-bottom: 1px solid grey;
    border-top: 1px solid grey;
}
.box-header .list{
    width: 700px;
    margin: 10px auto;
    list-style-type: none;
    display: flex;
    /* background-color: red; */
}

.box-header .list li {
    margin-right: 20px;
    
}

.content, .camp{
    padding: 20px;
}

.bog th{
    padding: 5px !important;
    background-color: lightgray;
}

</style>
</head>
<body>

<div class="box">
<div class="box-header">
    <ul class="list">
        <li> <a href="shop-list?dcat=Electronics">Electronics</a> </li>
        <li> <a href="shop-list?dcat=Computer and Accessories">Computer and Accessories</a> </li>
        <li> <a href="shop-list?dcat=Home and Kitchen">Home and Kitchen</a> </li>
        <li> <a href="shop-list?dcat=Phones and Tablets">Phones and Tablets</a> </li>
    </ul>
</div>
<div class="content">
Dear '.$username.', <br>
'.$messageSend.'
</div>

<div class="camp">
<table class="table table-bordered bog">
<tr>
<th>Delivery method</th>
<th>Recipient details</th>
</tr>
<tr>
<td>Delivery to Your Home or Office</td>
<td>'.$username.', '.$phone.' </td>
</tr>
<tr>
   <th colspan="2">Delivery address</th>
</tr>
<tr>
   <td colspan="2">
   '.$address.'
   </td>
</tr>
</table>

<h6>You ordered for:</h6>
<table class="table table-bordereds bog">
<tr>
<th></th>
<th>Item</th>
<th>Quantity</th>
<th>Price</th>
</tr>';
$sql = $conn->query("SELECT * FROM dcart WHERE orderid='$order'");
if($sql->num_rows>0){
    $total=$total_bill=0;
    while($row=$sql->fetch_assoc()):
    $total = $row['dtotal'];
    $charges = $row['dcharge'];
    $pay = $row['dpay_mth'];
    $total_bill += $total;
    $message .='
    <tr>
    <td>
    <img src="../_product_images/'.$row['dimg'].'" style="max-width: 100px;" alt="">
    </td>
    <td>
    <br>
    '.$row['pname'].'
    </td>
    <td>
    <br>
    '.$row['dqty'].'
    </td>
    <td>
    <br>
    '.number_format($row['dprice']).'
    </td>
    </tr>';
    endwhile; }$charges +=$charges;
    $message .='
</table>

<table class="table table-bordereds">
<tr>
   <th>SHIPPING COST</th>
   
   <td>
       &#8358;'.number_format($charges).'
   </td>

</tr>
<tr>
   <th>SHIPPING DISCOUNT</th>
   <td>
   &#8358;0   
   </td>
</tr>

<tr>
   <th>DISCOUNT</th>
   <td>
   &#8358;0       
   </td>
</tr>

<tr>
   <th>TOTAL</th>
   <td>
   &#8358;'.number_format($total_bill).'     
   </td>
</tr>

<tr>
   <th>PAYMENT METHOD</th>
   <td>';
   if($pay !='yespay'){
     $message .='Payment on delivery/pick-up';
    }else{
         $message .='Paystack';
    }
   $message .='  </td>
</tr>

</tr>


</table>


</div>
</div>
</body>
</html>

';

return $message;
}