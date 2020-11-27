<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include("styles.php"); ?>

</head>
<body id="page-top">
 <?php include("header.php"); 
//  if ($r['privilege'] !='admin') {  
//     $sp = $r['staff_privilege'];
//     $ex = explode(',', $sp);
//       if(!in_array('Orders', $ex)){
//         header("Location:index");
//       } 

//   }
  
  
   ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">
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
      <div class="container">
     
      
      <br>
      
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
             Email </div>
          
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
                 Dear Elefiku, <br>
                Thank you for shopping on Jumia! Your order 384722588 has been successfully confirmed. <br>

                It will be packaged and shipped as soon as possible. Once the item(s) is out for delivery or available for pick-up you will receive a notification from us. <br>
                Thanks you for shopping on Jumia.
                 </div>

                 <div class="camp">
                 <table class="table table-bordered bog">
                <tr>
                <th>Delivery method</th>
                <th>Recipient details</th>
                </tr>
                <tr>
                <td>Delivery to Your Home or Office</td>
                <td>Doe, +237089898987 </td>
                </tr>
                <tr>
                    <th colspan="2">Delivery address</th>
                </tr>
                <tr>
                    <td colspan="2">
                    Suite 15-16 Emmanuel plaza, G. U Ake road, Eligbolo, Eliozu Area, Port Harcourt PORTHARCOURT-ELIOZU
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
                </tr>

                <?php

                $order = 'Elect-201126041705';
                $sql = $conn->query("SELECT * FROM dcart WHERE orderid='$order'");
                if($sql->num_rows>0){
                    $ppname =''; $total=$total_bill=0;
                    while($row=$sql->fetch_assoc()):
                    $total = $row['dtotal'];
                    $charges = $row['dcharge'];
                    $pay = $row['dpay_mth'];
                    $total_bill += $total; ?>

                <tr>
                    <td>
                        <img src="../_product_images/<?php echo $row['dimg'] ?>" style="max-width: 100px;" alt="">
                    </td>
                    <td>
                        <br>
                        <?php echo $row['pname'] ?>
                    </td>
                    <td>
                        <br>
                        <?php echo $row['dqty'] ?>
                    </td>
                    <td>
                        <br>
                        &#8358;<?php echo number_format($row['dprice']) ?>
                    </td>
                </tr>
                <?php endwhile; }  $charges +=$charges; ?>
               
                </table>

                <table class="table table-bordereds">
                <tr>
                    <th>SHIPPING COST</th>
                    
                    <td>
                        &#8358;<?php echo number_format($charges); ?>
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
                    &#8358;<?php echo number_format($total_bill); ?>     
                    </td>
                </tr>

                <tr>
                    <th>PAYMENT METHOD</th>
                    <td>
                        <?php if($pay !='yespay'){
                            echo 'Payment on delivery/pick-up';
                        }else{
                            echo 'Paystack';
                        }
                        ?>
                    </td>
                </tr>
                
                </tr>
                
               
                </table>


                 </div>
             </div>
        

        </div>
        </div>

        <?php include("footer.php"); ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<?php include("scripts.php"); ?>




  
</div>