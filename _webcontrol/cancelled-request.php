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
        <li class="breadcrumb-item active">Cancelled Request</li>
      </ol>

      <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-3">
              <form action="seach-result" method="post">
                  <div class="form-group">
                      <input type="text" name="search" required class="form-control" placeholder="Enter Search" id="">
                  </div>
          </div>
          <div class="col-md-3">
              <button name="requestxx" class="btn btn-primary" type="submit">Search</button>
          </div>
          </form>
      </div>

      <div class="row my-3">

      <?php
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
         $page_no = $_GET['page_no'];
         }else{
            $page_no = 1;
         } 
         $total_records_per_page = 20;

      ?>
        
       <div class="col-md-12">
           <div class="card ">
               <div class="card-header">
                 Manage Cancelled Request
               </div>
               <div class="card-body">
               <div class="table-responsive">
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

                                            if(isset($_GET['search']) AND !empty($_GET['search'])){
                                                $search = $conn->real_escape_string($_GET['search']);

                                            $sqls =$conn->query("SELECT * FROM dwithdrawal WHERE dstatus='cancelled' AND dname='$search' OR dstatus='cancelled' AND damount='$search' OR dstatus='cancelled' AND ddate='$search' ORDER BY id ASC");
                                            $total_records =$sqls->num_rows;
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $start_from = ($page_no - 1) * $total_records_per_page;

                                            $cup = $conn->query("SELECT * FROM dwithdrawal WHERE dstatus='cancelled' AND dname='$search' OR dstatus='cancelled' AND damount='$search' OR dstatus='cancelled' AND ddate='$search' ORDER BY id ASC LIMIT $start_from, $total_records_per_page");
                                            }else{
                                                $sqls =$conn->query("SELECT * FROM dwithdrawal WHERE dstatus='cancelled' ORDER BY id ASC");
                                            $total_records =$sqls->num_rows;
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $start_from = ($page_no - 1) * $total_records_per_page;

                                            $cup = $conn->query("SELECT * FROM dwithdrawal WHERE dstatus='cancelled' ORDER BY id ASC LIMIT $start_from, $total_records_per_page");
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
                    <ul class="pagination">
                    <?php 
                        if(isset($_GET['search']) AND !empty($_GET['search'])){
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                            echo "<li  class='page-item '><a class='page-link' href='drivers-with-car?page_no=$counter&search=$search' style='color:#0088cc;'>$counter</a></li>"; 
                        
                        }
                    }else{
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                            echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                        
                        }
                    }
                    ?>
                    </ul>
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

</body>

</html>
