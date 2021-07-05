<?php 
	$page_title = "Dashboard";
	require_once '../db/db.php';
	if (!student_login()) 
	{
		header('location:login.php');
		exit();
	}
	require_once '../libs/head.php';
	require_once '../libs/main-menu.php';
 ?>

 <section class="content-wrapper">
 	<div class="content-header">
 		<h1><?php echo $page_title; ?></h1>
 		<ol class="breadcrumb">
 			<li><a href="tmp.php"><?php echo $page_title; ?></a></li>
 			<li class="active"><?php echo $page_title; ?></li>
 		</ol>
 	</div>
 	<div class="content">
 		<div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
 			<div class="callout callout-danger">
 				<h3>Student Dashboard</h3>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once '../libs/foot.php'; ?>
