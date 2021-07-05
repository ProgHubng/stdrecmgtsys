<?php 
	$page_title = "Admin Portal || All Admitted Candidate";
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
 		<ol class="breadcrumb">
 			<li><a href="dashboard.php">Dashboard</a></li>
 			<li class="active"><?php echo $page_title; ?></li>
 		</ol>
 	</div>
 	<div class="content">
 		<div class="row">
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="box box-danger">
 					<div class="box-header">
 						<h5 class="box-title"><?php echo $page_title; ?></h5>
 					</div>
 					<div class="box-body">
 						<table class="table table-boredered table-striped table-hover">
 							<thead>
 								<tr>
 									<th>Sn</th>
 									<th>Transaction Id</th>
 									<th>Photo</th>
 									<th>Full Name</th>
 									<th>Email Address</th>
 									<th>Phone Number</th>
 									<th>Faculty</th>
 									<th>Department</th>
 									<th>Action</th>
 								</tr>
 							</thead>
 							<tfoot>
 								<tr>
 									<th>Sn</th>
 									<th>Transacton Id</th>
 									<th>Photo</th>
 									<th>Full Name</th>
 									<th>Email Address</th>
 									<th>Phone Number</th>
 									<th>Faculty</th>
 									<th>Department</th>
 									<th>Action</th>
 								</tr>
 							</tfoot>
 							<tbody>
 								<?php 
 									$stmt = $db->prepare("SELECT * FROM app_payment WHERE payment_status= 1");
 									$stmt->execute(array('payment_status' =>1));
 									while ($rs = $stmt->fetch()) 
 									{
 										?>
 											<tr>
	 											<td><?php echo $rs['id']; ?></td>
	 											<td><?php echo $rs['payment_receipt_number'] ?></td>
	 											<td><img src="../images/<?php echo student_detail("upl"); ?>" class="img-circle img-size"></td>
	 											<td><?php student_detail('fname'); ?></td>
	 											<td><?php student_detail('email'); ?></td>
	 											<td><?php student_detail('phone'); ?></td>
	 											<td><?php student_detail('faculty'); ?></td>
	 											<td><?php student_detail('dept'); ?></td>
	 											<td><a href="view_app.php?id=<?php echo $rs['id']; ?>" class="btn btn-warning">View Profile</a></td>
	 											
 											</tr>
 										<?php
 									}
 									$stmt->closeCursor();
 								 ?>
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once 'libs/foot.php'; ?>
