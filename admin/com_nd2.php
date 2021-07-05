<?php 
	$page_title = "Computer Science ND 2 Full Time";
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
 			<div class="col-d-12 col-sm-12 col-xs-12">
 				<div class="box box-danger">
 					<div class="box-header">
 						<h5 class="box-title"><?php echo $page_title; ?></h5>
 					</div>
 					<div class="box-body">
 						<table class="table table-boredered table-striped table-hover">
 							 <thead>
 								<tr>
 									<th>Sn</th>
 									<th>Photo</th>
 									<th>Full Name</th>
 									<th>Email Address</th>
 									<th>Phone Number</th>
 									<th>Department</th>
 									<th>Level</th>
 									<th>Semester</th>
 									<th>Action</th>
 								</tr>
 							</thead>
 							<tfoot>
 								<tr>
 									<th>Sn</th>
 									<th>Photo</th>
 									<th>Full Name</th>
 									<th>Email Address</th>
 									<th>Phone Number</th>
 									<th>Department</th>
 									<th>Level</th>
 									<th>Semester</th>
 									<th>Action</th>
 								</tr>
 							</tfoot>
 							<tbody>
 								<?php 
 									$stmt = $db->prepare("SELECT * FROM students WHERE level =:level");
 									$stmt->execute(array('level' => 'ND 2 FT'));
 									while ($rs = $stmt->fetch()) 
 									{
 										?>
 											<tr>
 												<td><?php echo $rs['id']; ?></td>
	 											<td><img src="../images/<?php echo $rs['upl']; ?>" class="img-circle img-size"></td>
	 											<td><?php echo ucwords($rs['fname']); ?></td>
	 											<td><?php echo $rs['email']; ?></td>
	 											<td><?php echo $rs['phone']; ?></td>
	 											<td><?php echo $rs['dept']; ?></td>
	 											<td><?php echo $rs['level']; ?></td>
	 											<td><?php echo semester($rs['semester']); ?></td>
	 											<td><a href="view_app.php?id=<?php echo $rs['id']; ?>" class="btn btn-warning">View Profile</a></td> <br>
	 											<td><a href="results.php?id=<?php echo $rs['id']; ?>" class="btn btn-warning">Upload Results</a></td>
 											</tr>
 										<?php
 									}
 									$stmt->closeCursor();
 								 ?>
 							</tbody>
 						</table>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once 'libs/foot.php'; ?>
