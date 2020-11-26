<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from red-parts.themeforest.scompiler.ru/themes/red-ltr/account-orders by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 23:12:30 GMT -->


<?php include 'head.php';

if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
	header("location: login");
}

?>
<body><!-- site -->

<div class="site">
		<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>

		
	
		<!-- site__body -->
		<div class="site__body">
			<div class="block-space block-space--layout--after-header"></div>
			<div class="block">
				<div class="container container--max--xl">
					<div class="row">
						<div class="col-12 col-lg-3 d-flex">
							<div class="account-nav flex-grow-1">
								<h4 class="account-nav__title">Navigation</h4>
								<?php include 'link.php'; ?>
							</div>
						</div>

                        <?php
                            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                                $page_no = $_GET['page_no'];
                                } else {
                                    $page_no = 1;
                                    } 
                                    $total_records_per_page = 20;

                        ?>

						<div class="col-12 col-lg-9 mt-4 mt-lg-0">
							<div class="card">
								<div class="card-header">
									<h5>Direct Purchases History</h5>
								</div>
								<div class="card-divider"></div>
								<div class="card-table">
									<div class="table-responsive-sm">
										<table> 
											<thead>
												<tr>
													<th>Date Order</th>
													<th>Transaction ID</th>
													<!-- <th>Total Bill</th> -->
													<th>Payment Status</th>
													<th>Status</th>
													<th>---</th>
												</tr>
											</thead>
											<tbody>
                                            <?php

                                                $id = $conn->real_escape_string($_SESSION['userid']);
                                                $sqls = $conn->query("SELECT * FROM `dcart` WHERE userid='$id' AND orderid !='' GROUP BY orderid ORDER BY id DESC");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                
                                                $poo = $conn->query("SELECT * FROM `dcart` WHERE userid='$id' AND orderid !='' GROUP BY orderid ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                                                if($poo->num_rows>0){
                                                    while($row = $poo->fetch_assoc()):
                                                ?>
												<tr>
													<td><?php echo date("d M Y", strtotime($row['created_date'])); ?></td>
													<td><?php echo $row['orderid']; ?></td>

													<!-- <td>
                                                    &#8358;<?php //echo number_format($row['dtotal']);  ?>
                                                    
                                                    </td> -->
                                                    
													<td> <?php echo  ucfirst($row['dpayment_status'])  ?></td>
													<td><?php echo ucfirst($row['dorder_status']); ?></td>
													<td>
                                                    
                                                    <a href="cart-payment-detail?orderid=<?php echo $row['orderid']; ?>&date=<?php echo date("d M Y", strtotime($row['created_date'])); ?>" class="btn-sm btn-info btn">Details</a>
                                                    
                                                    
                                                    </td>
												</tr>
                                                    <?php endwhile; }else{
                                                    echo '<tr><td colspan="7">No result found</td></tr>';
                                                }  ?>
												
											</tbody>
										</table>
									</div>
								</div>

								<div class="card-divider"></div>

								<div class="card-footer">
									<ul class="pagination">
										

                            <?php 
                                for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                    echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                
                                }
                            ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--before-footer"></div>
		</div><!-- site__body / end -->
		<!-- site__footer -->
		
<?php include("footer.php"); ?>
	<!-- site__footer / end -->
</div><!-- site / end --><!-- mobile-menu -->
<?php include("mobile-header2.php"); ?>
	
	<!-- mobile-menu / end --><!-- quickview-modal -->
	<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div><!-- quickview-modal / end --><!-- add-vehicle-modal -->
	
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div>    
        <div class="pswp__scroll-wrap"><div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button><!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>--> 
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> 
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> 
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div><!-- photoswipe / end --><!-- scripts -->
    <?php include("scripts.php"); ?>
 </body>
</html>