<?php 
	$page_title = "Application Details";
	require_once '../db/db.php';
	if (!admission()) 
	{
		header('location:admission.php');
		exit();
	}
	require_once '../libs/head.php';
	require_once '../libs/main-menu.php';
 ?>

 <section class="content-wrapper">
 	<div class="content-header">
 		<h1><?php echo $page_title; ?></h1>
 		<ol class="breadcrumb">
 			<li><a href="tmp.php">Dashboard</a></li>
 			<li class="active"><?php echo $page_title; ?></li>
 		</ol>
 	</div>
 	<div class="content">
 		<div class="row">
 			<div class="col-md-12 col-s-12 col-xs-12">
 				<div class="box">
 					<div class="box-header">
 						<h5 class="box-title"><?php echo $page_title; ?></h5>
 					</div>
 					<div class="box-body">
 						<div class="pull-right">
 							<div class="img-responsive">
 								<img src="images/<?php echo admission_details('upl'); ?>">
 							</div>
 						</div>
 						<h5 class="page-header">Applicant Details</h5>
 						<table class="table table-striped table-hover">
				    				<tr>
				    					<td>Application No.</td>	
				    					<td><?php echo admission_details('application_no'); ?></td>		    				
				    				</tr>
				    				<tr>
				    					<td>Full Name</td>
				    					<td><?php echo ucwords(admission_details("surname").' '.admission_details('othername')); ?></td>
				    				</tr>
				    				<tr>
				    					<td>Email Address</td>
				    					<td><?php echo admission_details('email'); ?></td>
				    				</tr>
				    				<tr>
				    					<td>Phone Number</td>
				    					<td><?php echo admission_details('phone'); ?></td>
				    				</tr>
				    				<tr>
				    					<td>Nex Of Kin</td>
				    					<td><?php echo ucwords(admission_details('kin')); ?></td>
				    				</tr>
				    				<tr>
				    					<td>Date Of Birth</td>
				    					<td><?php echo admission_details('birth'); ?></td>
				    				</tr>
				    				<tr>
				    					<td>Gender</td>
				    					<td><?php echo admission_details('gender'); ?></td>
				    				</tr>
				    				<tr>
				    					<td>Form Type</td>
				    					<td><?php echo form_type(admission_status('form_type')); ?></td>
				    				</tr>
				    				<tr>
				    					<td>Marital Status</td>
				    					<td><?php echo admission_details('marital_status'); ?></td>
				    				</tr>
				    				<tr>
										<td>Department</td>
										<td><?php echo department(admission_details('dept')); ?></td>
				    				</tr>
				    				<tr>
				    					<td>State Of Origin</td>
				    					<td><?php echo admission_details('state'); ?> State</td>
				    				</tr>
				    				<tr>
				    					<td>Local Gov.</td>
				    					<td><?php echo ucwords(admission_details('local_gov')); ?></td>
				    				</tr>
				    				<tr>
				    					<td>Admission Status</td>
				    					<td><?php echo admission_status(admission_details('admission_status')); ?></td>
				    				</tr>
				    		</table>
				    	<h5 class="page-header">Examination Details</h5>
				    	<table class="table table-striped table-hover">
				    		<tr>
				    			<td>Examination Type</td>
				    			<td><?php echo admission_exam('exam_type'); ?></td>
				    		</tr>
				    		<tr>
				    			<td>Examination Number</td>
				    			<td><?php echo strtoupper(admission_exam('exam_number')); ?></td>
				    		</tr>
				    		<tr>
				    			<td>Examination Date</td>
				    			<td><?php echo admission_exam('exam_date'); ?></td>
				    		</tr>
				    	</table>
				    	<h5 class="page-header">O'Level Result</h5>
				    	<table class="table table-striped table-hover">
				    		<tr>
				    			<td><?php echo admission_exam('subject1'); ?></td>
				    			<td><?php echo admission_exam('grade_score1'); ?></td>
				    		</tr>
				    		<tr>
				    			<td><?php echo admission_exam('subject2'); ?></td>
				    			<td><?php echo admission_exam('grade_score2'); ?></td>
				    		</tr>
				    		<tr>
				    			<td><?php echo admission_exam('subject3'); ?></td>
				    			<td><?php echo admission_exam('grade_score3'); ?></td>
				    		</tr>
				    		<tr>
				    			<td><?php echo admission_exam('subject4'); ?></td>
				    			<td><?php echo admission_exam('grade_score4'); ?></td>
				    		</tr>
				    		<tr>
				    			<td><?php echo admission_exam('subject5'); ?></td>
				    			<td><?php echo admission_exam('grade_score5'); ?></td>
				    		</tr>
				    	</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once '../libs/foot.php'; ?>