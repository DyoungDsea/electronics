<?php
@session_start();
// error_reporting(0);
//check whether on localhost or online
$localhost = array(
    '127.0.0.1',
    '::1'
);

if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_ENGINE', "electronics");
}
else {
define('DB_SERVER', "localhost");
define('DB_USER', "tyrezghb_server");
define('DB_PASSWORD', "blaiseautocare100@");
define('DB_ENGINE', "tyrezghb_blaise");
}

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_ENGINE);

if ($conn->connect_error) {
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

putenv("TZ=Africa/Lagos");

$dsett = mysqli_query($conn, "select * FROM _security where id='1'") or die(mysqli_error($conn));
while($irow = $dsett->fetch_assoc()){
$dcompany=$irow['dcompany'];
$dlogo=$irow['dlogo'];
$dcomm_address=$irow['address'];
$dcomm_phone=$irow['dphone'];
$dcomm_phone2=$irow['dphone2'];
$dcomm_email=$irow['demail'];
$currency=$irow['icurrency'];
$web_title=$irow['dtitle'];
$web=$irow['dwebsite'];
$namew=$irow['dname'];

$aboutus=$irow['aboutus'];
$dterms=$irow['dterms'];
$dservices=$irow['dservices'];

//social urls
$sfb=$irow['social_fb'];
$stw=$irow['social_tw'];
$sin=$irow['social_in'];
$syt=$irow['social_gp'];
$slk=$irow['social_lk'];
$you=$irow['social_you'];
$nname="blaisetyres";
$next="blaisetyres.com";
$rand=date('his');
}
require("last_seen.php");

function discount($num, $price){
    $nums = ((Float)$num / 100) * $price;
    $nums = $price - $nums;
    return $nums;
}

//include 'star-rating.php';

function findBaseName($data){
    if(basename($_SERVER["REQUEST_URI"])==$data){
      echo 'account-nav__item--active';
    }
  }


  function sendBack(){
    echo '<a href="javascript:history.back()" style="margin: 20px 0" class="btn btn-info pull-rights btn-sm"> <i class="fa fa-arrow-circle-left"></i> Back</a>';
  }


  
function messageToUsers($order, $rowId='', $username, $messageSend, $phone, $address){
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
<center>
<img src="../images/logo.png" style="max-width: 50%;" alt="Logo">
</center>
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
if(!empty($rowId)){
  $sql = $conn->query("SELECT * FROM dcart WHERE orderid='$order' AND id='$rowId'");
}else{
  $sql = $conn->query("SELECT * FROM dcart WHERE orderid='$order'");
}
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


?>

