<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();
include 'conn.php';
function spamcheck($field)
  {
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }

  $userid = date("ymdhis").rand(10000, 999999);


  $mailcheck = spamcheck($_POST['email']);
  $email = strip_tags($_POST['email']);
  $phone = strip_tags($_POST['phone']);
  $address = strip_tags($_POST['message']);
  $name = strip_tags($_POST['name']);
  $store = strip_tags($_POST['store']);
  $spam1 = strip_tags($_POST['spam1']);
    $spam2 = strip_tags($_POST['spam2']);
    $pass = md5(strip_tags($_POST['pass']));
    $cpass = md5(strip_tags($_POST['cpass']));
    if($pass ===$cpass){
    if($spam1==$spam2){
        $sql=$conn->query("INSERT INTO _security SET userid='$userid', email='$email', uname='$name', dcompany='$store', pword='$pass', drank='seller', address='$address', dphone='$phone', privilege='staff', dprivilege='Product,Orders', status='online'");
        if($sql){
            $_SESSION["msg"]= "<b>Congratulations</b>! your store have been created successfully, wait until the admin confirmed your store.";
        }else{
            $_SESSION["msg2"]= "Sorry!...try again later";
        }
    }

  }else{
    
      $_SESSION["msg2"]= "Sorry!...Password does not match";
  
  }

//   if($name=='' or $message==''){
//      $_SESSION["msg2"]= "One or more required inputs missing... Try again!";
//     }
// 	elseif($mailcheck==FALSE){
//     $_SESSION["msg2"]= "Invalid email address format. try again!"; 
//     }	
//     else if($spam1!==$spam2){
//       $_SESSION["msg2"]= "Invalid anti-spam code supplied... Try again!"; 
//         }
//   else{
// 	//send email
//   $subject="Web Enquiry from - ".$name;
// 	$details="Sender: ".$name."\n"."Email Address: ".$email."\n\n".$message;
//     if(mail($mailer, $subject, $details, "From: $email")){
//       $_SESSION["msg"]= "Your message was delivered successfully!";
//     }else{
//       $_SESSION["msg2"]= "Sorry!...Message could not be sent!";
//     }
//   }
  header("Location: new-store"); 
?>