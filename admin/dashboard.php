<?php 
	$page_title = "Dashboard";
	require_once '../db/db.php';
	if (!admin()) 
	{
		header('location:login.php');
		exit();
	}
	require_once 'libs/head.php';
	require_once 'libs/menu.php';
 ?>

 <section class="content-wrapper">
 	<div class="content-header">
 		<h1><?php echo $page_title; ?></h1>
 	</div>
 	<div class="content">
 		<div class="row">
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="callout callout-success">
 					<h3>Lautech Admin Portal</h3>
 					<h2>School Portal</h2>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once 'libs/foot.php'; ?>