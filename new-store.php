
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include("head.php"); ?>

<body>
	<!-- site -->
	<div class="site">
	<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
		<!-- site__body -->
		<div class="site__body">
			<!-- <div class="block-map block">
				<div style="background-image:url(images/main.jpg);height:400px;background-position:center left;" class="block-map__body"></div>
			</div> -->
			<div class="block-header block-header--has-breadcrumb block-header--has-title">
				<div class="container">
					<div class="block-header__body">
						<nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
							<ol class="breadcrumb__list">
								<li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
								<li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a
										href="index" class="breadcrumb__item-link">Home</a></li>
								
								<li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last"
									aria-current="page"><span class="breadcrumb__item-link">New Store</span></li>
								<li class="breadcrumb__title-safe-area" role="presentation"></li>
							</ol>
						</nav>
						<h1 class="block-header__title dodo">Create New Store</h1>
					</div>
				</div>
			</div>
			<div class="block">
				<div class="container container--max--lg">
					<div class="card">
						<div class="card-body card-body--padding--2">
							<div class="row">
								<?php
						if(isset($_SESSION['msg'])){ ?>
						<div class="col-md-12 text-center text-success">
						<h4><?php echo $_SESSION['msg']; ?></h4>
						</div>
						<?php }	else if(isset($_SESSION['msg2'])){ ?>
							<div class="col-md-12 text-center text-danger">
						<h4><?php echo $_SESSION['msg2']; ?></h4>
						</div>							
						<?php } ?>
						
								<div class="col-12 col-lg-3"></div>
								<div class="col-12 col-lg-6">
									<div class="ml-1">
										<h4 class="contact-us__header card-title">Fill the form below</h4>
										<form action="store-process" method="post">
											<div class="form-row">
									<div class="form-group col-md-12">
										<label for="form-name">Your Name</label> 
										<input type="text" name="name" required class="form-control" placeholder="Your Fullname">
                                    </div>
                                    <div class="form-group col-md-12">
										<label for="form-subject">Store Name</label> 
										<input type="text" name="store" class="form-control" placeholder="Store Name">
									</div>
									<div class="form-group col-md-12">
										<label for="form-subject">Choose Password</label> 
										<input type="password" name="pass" class="form-control" placeholder="Choose Password">
                                    </div>
									<div class="form-group col-md-12"><label for="form-email">Email</label>
										<input type="email" name="email" class="form-control" placeholder="Email Address"></div>
									</div>
											<div class="form-group"><label for="form-subject">Phone Number</label> 
											<input type="text" name="phone" class="form-control" placeholder="Phone Number">
										</div>
										<div class="form-group"><label for="form-message">Address</label> 
										<textarea name="message" class="form-control" placeholder="Address" rows="4"></textarea>
									</div>
									<p>Verify that you're a human being <i style="font-weight:600; color:#f00"><?php echo $rand; ?></i></p>
                                            <input type="hidden" required name="spam1" value="<?php echo $rand; ?>">
                                            <p><input required class="verify" type="text" id="verify" name="spam2" /></p>
											<button type="submit" class="btn btn-primary">Create Store</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--before-footer"></div>
		</div><!-- site__body / end -->
		<!-- site__footer -->
		
			

	<?php //include("block2.php"); ?>
		<?php include("footer.php"); ?>
	</div><!-- mobile-menu / end -->
	<?php include("mobile-header2.php"); ?>
	
	<!-- scripts -->
	<?php include("scripts.php"); ?>
</body>
</html>
<?php
unset($_SESSION['msg']);
unset($_SESSION['msg2']);
?>