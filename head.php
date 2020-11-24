<?php

@session_cache_expire(120);
@ini_set('session.gc_maxlifetime', 7200); 

include("conn.php");
require 'star-rating.php';

	if(isset($_SESSION['transid'])){
		$transid=$_SESSION['transid'];
	}else{
		$transid=date('ymdHis');
		$_SESSION['transid']=$transid;
	}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">



<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>Home Two — Red Parts </title>

<link rel="icon" type="image/png" href="images/favicon.png">
<!-- fonts -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
<!-- css -->

<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">

<link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css">

<link rel="stylesheet" href="vendor/photoswipe/photoswipe.css">

<link rel="stylesheet" href="vendor/photoswipe/default-skin/default-skin.css">

<link rel="stylesheet" href="vendor/select2/css/select2.min.css">

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/style.header-classic-variant-one.css" media="(min-width: 1200px)">

<link rel="stylesheet" href="css/style.mobile-header-variant-one.css" media="(max-width: 1199px)">
<!-- font - fontawesome -->

<link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8">
</script>
<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag("js", new Date());gtag("config", "UA-97489509-8");
</script>
</head>
