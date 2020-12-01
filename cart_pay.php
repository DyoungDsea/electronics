<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 

include("conn.php");
require 'clean.php';
$reep = $conn->query("SELECT * FROM dpercent ")->fetch_assoc();

    // $email=$_SESSION['email'];
        $orderid = clean($_SESSION['transid']);
        $userid = clean($_SESSION['userid']);
        $ppname = '';

    foreach($_SESSION["budget"] as $keys => $values){

        $pid = clean($values['id']);
        $pname = clean($values['name']);
        $img = clean($values['img']);
        $brand = clean($values['brand']);
        $vcode = clean($values['vcode']);
        $sku = clean($values['sku']);
        $store_id = clean($values['store']);
        $company = clean($values['company']);
        $qty = clean($values['qty']);
        $price = clean($values['price']);
        $charge = clean($_SESSION['costsx']);
        $total = ($values['qty'] * $values['price']);
        //Insert product into database
        $conn->query("INSERT INTO dcart SET userid='$userid', orderid='$orderid', dpid='$pid', pname='$pname', dsku='$sku', dbrand='$brand', dvcode='$vcode', dprice='$price', dqty='$qty', dcharge='$charge', dtotal='$total', dimg='$img', dcompany='$company', dstore_id='$store_id' ");

        // echo $userid.' '.$grand.' '.$pid.'<br>'.$pname.' '.$brand.' '.$sku.'<br>'.$vcode.' '.$img.' '.$qty.'<br> '.$cost.' '.$price.' '.$location.' '.$charge;
        $ppname .=$pname.' & ';

    }   

    // echo $ppname;
    // die();
    $location = clean($_SESSION['locationx']);
    $cost = clean($_SESSION['costx']);
    $grand = clean($_SESSION['grandx']);
    
    if(isset($_SESSION['Address'])){
        $adds = clean($_SESSION['Address']);
        //insert net address to user shipping address and set it to default
        $ship_id=date('YdmHis');  
        $conn->query("UPDATE dship_address SET dstatus='no' WHERE userid='$userid' ");     
        $sql = $conn->query("INSERT INTO `dship_address` SET userid='$userid', dship_id='$ship_id', daddress='$adds', dstatus='yes' ");
    }else{
        $adds = $_SESSION['ship_address'];
    }

    $address = $conn->query("SELECT * FROM `dship_address` WHERE userid='$userid' AND dstatus='yes' ")->fetch_assoc();
    $adds = $address['daddress'];
    
    $conn->query("UPDATE `dcart` SET dlocation='$location', daddress='$adds' WHERE orderid='$orderid' AND userid='$userid' ");
    // $conn->query("INSERT INTO `dcart_holder` SET orderid='$orderid', userid='$userid', dtotal_bill='$grand', dlocation='$location', dcharges='$cost', daddess='$adds' ");


    // echo '<br>........................................<br>';
    // die() ;

        //check if payment was successfull
        $result = array();
    //The parameter after verify/ is the transaction reference to be verified
    $payrefrence=$_SESSION['transid'];
    $url = 'https://api.paystack.co/transaction/verify/'.$payrefrence;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer sk_test_a52ae7b8696d4d79a141015fbe4153555bcaf748']
    );
    $request = curl_exec($ch);
    curl_close($ch);
    
    if ($request) {
        $result = json_decode($request, true);
    }

   $order = date("ymdhis");
   $email = clean($_SESSION['email']);
   $name = clean($_SESSION['name']);
    
    if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
        //update database and set user payment

        $d = $conn->query("SELECT * FROM login WHERE userid='$userid'")->fetch_assoc();
       
        if($d['referrer'] != NULL){
            $referrer = $d['referrer'];
            $d = $conn->query("SELECT demail, dwallet FROM login WHERE userid='$referrer'")->fetch_assoc();
            $emails = $dd['demail'];
            $names = $dd['dname'];
            $wall = (Float)$dd['dwallet'];
            $percent = $reep['reef']/100;
            $res = $percent * $grand;
            $final = $wall + $res;
            //update wallet
            $conn->query("UPDATE login SET dwallet='$final' WHERE userid='$referrer'");
            $subject="Referrer Bonus";
            $message="Hello ".$names.", your wallet has been credited with $res\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($emails,$subject,$message,$header);

        }

        
        //Update cart details and update store wallet
        $sqlx = $conn->query("SELECT * FROM dcart WHERE userid='$userid' AND orderid='$orders'");
            if($sqlx->num_rows>0){
                while($row=$sqlx->fetch_assoc()):
                    //find store id and total of each items
                    $store = $row['dstore_id'];
                    $total = $row['dtotal'];
                    //store
                    $sql = $conn->query("SELECT * FROM _security WHERE userid='$store'");
                    if($sql->num_rows>0){
                        $user = $sql->fetch_assoc();
                        //check is is admin or seller
                        if($user['drank']=="seller"){
                            $wallet = $user['dwallet'];
                            $sum = (Int)$wallet + (Int)$total;
                        $conn->query("UPDATE _security SET dwallet='$sum' WHERE userid='$store'");
                        }else{
                            $sql = $conn->query("SELECT * FROM _security WHERE userid='91234567899834'")->fetch_assoc();
                            $wallet = $sql['dwallet'];
                            $sum = (Int)$wallet + (Int)$total;
                            $conn->query("UPDATE _security SET dwallet='$sum' WHERE userid='91234567899834'");
                        }
                    }


                endwhile;
            }
        
        $up = $conn->query("UPDATE `dcart` SET dpayment_status='paid' WHERE orderid='$orderid' AND userid='$userid' ");
        
        // $up = $conn->query("UPDATE `dcart_holder` SET payment_status='paid' WHERE orderid='$orderid' AND userid='$userid' ");
        $conn->query("INSERT INTO history SET amt_paid='$grand', pname='$ppname', userid='$user', orderid='$orderid', dpid='$order' ");
        $to = $email;
        $subject="Order Placed";
        $message="Hello ".$name.", your order  has been received. this is your tracking ID: $orderid \r\n";
        $header= "From: ".$web." <".$dcomm_email.">";
        mail($email,$subject,$message,$header);
        // $dcomm_email;
        $messages = "Order has been placed by $name, tracking ID:  $orderid \r\n";

        mail($dcomm_email,$subject,$messages);
        
        $_SESSION['msgs']="Your order has been placed";
    }
    else{

        $_SESSION['msg']="Your payment was not successful!";
    }
//unset pay reference
unset($_SESSION['transid']);
unset($_SESSION['budget']);
unset($_SESSION['locationx']);
unset($_SESSION['grandx']);
unset($_SESSION['costx']);
unset($_SESSION['costsx']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['Address']);
//---------------
header("location: account-direct-purchases");
?> 