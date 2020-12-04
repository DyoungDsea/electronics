
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
 if ($r['privilege'] !='admin') {  
    $sp = $r['dprivilege'];
    $ex = explode(',', $sp);
      if(!in_array('Orders', $ex)){
        header("Location:index");
      } 

  }
  
  $_SESSION['name']=$r['uname'];
  $_SESSION['userid']=$r['userid'];
   ?>

<div id="wrapper">

<?php include("aside.php"); ?>

  <div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb mt-2">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Wallet</li>
      </ol>

      <?php
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
         $page_no = $_GET['page_no'];
         }else{
            $page_no = 1;
         } 
         $total_records_per_page = 20;

      ?>

      <div class="row my-3">

     
        
       <div class="col-md-12">
           <div class="card ">
               <div class="card-header">
                 My Wallet
               </div>
               <div class="card-body">
               

               <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                    <p>
                        <b>Wallet Balance:</b> &#8358;<?php echo number_format($r['dwallet']); ?>
                    </p>
                    <div id="showRoom" style="text-align: left;">
                        <form action="wallet-process" method="post">
                        <div class="col-md-12">
                        <label for="">Enter Amount</label>
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Amount eg 5000" id="amount" value="" required name="amount">
                        <input type="hidden"  id="bal" value="<?php echo $r['dwallet'] ?>"  name="wallet">
                        
                        </div>
                        <p id="error"></p>
                        <button id="btn" name="request" disabled class="btn btn-primary btn-sm">Submit</button>
                    </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                    </form>
                </div>


                <div class="table-responsive mt-5">
                <table class="table table-bordereds">
                                        <thead>
                                            
                                            <tr>
                                                <th>Date </th>
                                                <th>Username </th>
                                                <th>Amount(&#8358;)</th>
                                                <th>Status </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                $userid = $r['userid'];
                                            if(isset($_GET['search']) AND !empty($_GET['search'])){
                                                $search = $conn->real_escape_string($_GET['search']);

                                            $sqls =$conn->query("SELECT * FROM _security INNER JOIN dwithdrawal ON dwithdrawal.userid=_security.userid WHERE dwithdrawal.dstatus='pending' AND dwithdrawal.dname='$search' OR dwithdrawal.dstatus='pending' AND dwithdrawal.damount='$search' OR dwithdrawal.dstatus='pending' AND dwithdrawal.ddate='$search' ORDER BY dwithdrawal.id  ASC");
                                            $total_records =$sqls->num_rows;
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $start_from = ($page_no - 1) * $total_records_per_page;

                                            $cup = $conn->query("SELECT * FROM _security INNER JOIN dwithdrawal ON dwithdrawal.userid=_security.userid WHERE dwithdrawal.dstatus='pending' AND dwithdrawal.dname='$search' OR dwithdrawal.dstatus='pending' AND dwithdrawal.damount='$search' OR dwithdrawal.dstatus='pending' AND dwithdrawal.ddate='$search' ORDER BY dwithdrawal.id ASC LIMIT $start_from, $total_records_per_page");
                                            }else{
                                                $sqls =$conn->query("SELECT * FROM _security INNER JOIN dwithdrawal ON dwithdrawal.userid=_security.userid WHERE dwithdrawal.userid='$userid' ORDER BY dwithdrawal.id ASC");
                                            $total_records =$sqls->num_rows;
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $start_from = ($page_no - 1) * $total_records_per_page;

                                            $cup = $conn->query("SELECT * FROM _security INNER JOIN dwithdrawal ON dwithdrawal.userid=_security.userid WHERE dwithdrawal.userid='$userid' ORDER BY dwithdrawal.id ASC LIMIT $start_from, $total_records_per_page");
                                            }
                                            if($cup->num_rows>0){
                                                while($car = $cup->fetch_assoc()):?>
                                            <tr>
                                                <td><?php echo $car['ddate']; ?></td>
                                                <td><?php echo $car['dname']; ?></td>
                                                <td><?php echo number_format($car['damount']); ?></td>
                                                <td><?php echo ucfirst($car['dstatus']); ?></td>
                                            
                                            </tr>

                                            <?php    endwhile;
                                            }else{
                                                echo "<tr><td colspan='6' class='text-danger'>No result found</td></tr>";
                                            }
                                            ?>
                                        
                                        </tbody>

                                    </table>
                </div>
               
               </div>
           </div>

           


       </div>
     
        
      </div>
    </div>

    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
   <?php include("footer.php"); ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>


<?php include("scripts.php"); ?>

     
<?php 
    $sql =$conn->query("SELECT * FROM dregister INNER JOIN dwithdrawal ON dwithdrawal.userid=dregister.duserid WHERE dwithdrawal.dstatus='pending' ORDER BY dwithdrawal.id");
    if($sql->num_rows>0){
        while($row=$sql->fetch_assoc()){?>

    <div class="modal fade" id="url<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Account Details</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Username</th>
                        <td> <?php echo $row['dfname']; ?> </td>
                    </tr>

                    <tr>
                        <th>Account Name</th>
                        <td> <?php echo $row['dacc_name']; ?> </td>
                    </tr>

                    <tr>
                        <th>Account Number</th>
                        <td> <?php echo $row['dacc_number']; ?> </td>
                    </tr>

                    <tr>
                        <th>Bank</th>
                        <td> <?php echo $row['dbank']; ?> </td>
                    </tr>

                    <tr>
                        <th>Total Request</th>
                        <td> &#8358;<?php echo number_format($row['damount']); ?> </td>
                    </tr>
                </table>
            </div>

                
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">close</button>
            </div>
        </div>
        </div>
    </div>
        <?php } } ?>

        <script>
           $(document).ready(function(){
            $(document).on("keyup", "#amount", function(){
               var amount = $("#amount").val();
               var bal = $("#bal").val();
               if(amount.length > 3)
               if(Number(amount) > Number(bal)){
                  $("#error").html("<span class='text-danger'>Invalid Number</span>");
                  $("#btn").prop("disabled",true);
               }else{
                  $("#error").html("");
                  $("#btn").prop("disabled",false);
               }

            })
           })
        </script>

</body>

</html>
