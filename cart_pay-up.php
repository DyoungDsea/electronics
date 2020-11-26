<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 

include("conn.php");
require 'clean.php';

    // $email=$_SESSION['email'];
        $orderid = clean($_SESSION['transid']);
        $userid = clean($_SESSION['userid']);
      
$reep = $conn->query("SELECT * FROM dpercent ")->fetch_assoc();
        //check if payment was successfull
        $result = array();
    //The parameter after verify/ is the transaction reference to be verified
    $payrefrence=$orderid;
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
    $orders = $_SESSION['orderid'];
    $ppname = $_SESSION['ppname'];
    $grand = $_SESSION['total-bill'];

    if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
        //update database and set user payment
        $d = $conn->query("SELECT * FROM login WHERE userid='$userid'")->fetch_assoc();
    //    echo var_dump(!is_null($d['referrer']));die();
        if(!is_null($d['referrer'])){
            echo $referrer = $d['referrer'];die();
            $dd = $conn->query("SELECT * FROM login WHERE userid='$referrer'")->fetch_assoc();
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
        
        $up = $conn->query("UPDATE `dcart` SET dpayment_status='paid' WHERE orderid='$orders' AND userid='$userid' ");
        $conn->query("INSERT INTO history SET amt_paid='$grand', pname='$ppname', userid='$userid', orderid='$orderid', dpid='$order' ");
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
//---------------
header("location: account-direct-purchases");
?> 