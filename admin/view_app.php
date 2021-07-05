<?php 
	$page_title = "Student Profile";
	require_once '../db/db.php';
	if (!admin()) 
	{
		header('location:login.php');
		exit();
	}
	if (isset($_POST['ok'])) 
	{
		$level = $_POST['level'];
		$semester = $_POST['semester'];
            if (isset($_GET['id']))
            {
                $stmt = $db->prepare("UPDATE application SET level =:level, semester =:semester WHERE id =:id");
                $stmt->execute(array('level' => $level,'semester' => $semester,'id' => $_GET['id']));
                set_flash('student profile has been update successfully','info');
            }
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
 						<h5 class="box-title">Student Biodata</h5>
 					</div>
 					<div class="box-body">
 						<?php flash(); ?>
 						<?php 
                            if (isset($_GET['id'])) 
                            {
                                $stmt = $db->prepare("SELECT * FROM application WHERE id =:id");
                                $stmt->execute(array('id' => $_GET['id']));
                                while ($rs = $stmt->fetch()) 
                                {
                                    ?>
                    <table class="table table-boredered table-striped  table-hover">
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
                                </tr>
                            </thead>

 							<tbody>
 									<tr>
 											<td><?php echo $rs['id']; ?></td>
 											<td><img src="../images/<?php echo $rs['upl']; ?>" class="img-circle img-size"></td>
 											<td><?php echo ucwords($rs['fname']); ?></td>
 											<td><?php echo $rs['email']; ?></td>
 											<td><?php echo $rs['phone']; ?></td>
 											<td><?php echo $rs['dept']; ?></td>
 											<td><?php echo $rs['level']; ?></td>
 											<td><?php echo semester($rs['semester']); ?></td>
  									</tr>		
 							</tbody>
 						</table>

 						<h5 class="page-header" style="margin-top: 20px;"></h5>
 						<table class="table table-striped table-boredered table-hover">
 							<thead>
 								<tr>
 									<th>Sex</th>
 									<th>Date Of Birth</th>
 									<th>State</th>
 									<th>Local Government</th>
 									<th>Home Town</th>
 									<th>Home Address</th>
 								</tr>
 							</thead>
 							
 							<tbody>
 								<?php 
 									$stmt = $db->prepare("SELECT * FROM application WHERE id = id");
 									$stmt->execute(array('id'=> $_GET['id']));
 									while ($rs = $stmt->fetch()) 
 									{
 										// var_dump($rs);
 										?>
 										<tr>
 											<td><?php echo $rs['sex']; ?></td>
 											<td><?php echo $rs['dob']; ?></td>
 											<td><?php echo $rs['state']; ?> State</td>
 											<td><?php echo $rs['lga']; ?></td>
 											<td><?php echo $rs['town']; ?></td>
 											<td><?php echo $rs['addr']; ?></td>
 										</tr>
 										<?php
 									}
 								 ?>
 							</tbody>
 						</table>

 						<h5 class="page-header" style="margin-top: 30px;">O'Level Result Examination Details</h5>

 						<table class="table table-striped table-striped table-hover">
 							
                            <?php
                             $stmt = $db->prepare("SELECT * FROM application WHERE id =:id");
                                $stmt->execute(array('id' => $_GET['id']));
                                while ($rs = $stmt->fetch()) 
                            {
                            // var_dump($rs);
                            ?>
 								<tr>
 									<th>Examination Type</th>
                                    <th><?php echo ucfirst($rs['exam_type']); ?></th>
                                </tr>
                                <tr>
 									<th>Examination Number</th>
                                    <th><?php echo strtoupper($rs['exam_number']); ?></th>
                                </tr>
                                <tr>
 									<th>Examination Date</th>
                                    <th><?php echo $rs['exam_date']; ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                     		
                     				
                     		<tbody >		
 							<?php 
 								 $stmt = $db->prepare("SELECT * FROM application WHERE id =:id");
                                $stmt->execute(array('id' => $_GET['id']));
                                while ($rs = $stmt->fetch()) 
 								{
 									?>

 									<tr>
 										<th><?php echo $rs['subject1']; ?></th>
 										<th><?php echo $rs['grade_score1']; ?></th>
 									</tr>
 									<tr>
 										<th><?php echo $rs['subject2']; ?></th>
 										<th><?php echo $rs['grade_score2']; ?></th>
 									</tr>
 									<tr>
 										<th><?php echo $rs['subject3']; ?></th>
 										<th><?php echo $rs['grade_score3']; ?></th>
 									</tr>
 									<tr>
 										<th><?php echo $rs['subject4']; ?></th>
 										<th><?php echo $rs['grade_score4']; ?></th>
 									</tr>
 									<tr>
 										<th><?php echo $rs['subject5']; ?></th>
 										<th><?php echo $rs['grade_score5']; ?></th>
 									</tr>
 									<?php
 								}
 							 ?>
 						  </tbody>
 						</table>

 						<h5 class="page-header" style="margin-top: 20px;">Student Status</h5>
 						<form class="form-group has-error"   method="post" role="form">
 							<div class="form-group">
 								<label>Level</label>
 								<select class="form-control form-control-select custom-select" name="level" required="">
 									<option>100L</option>
                                            <option value="200L">200L</option>
                                            <option>300L(Sci. Opt)</option>
                                            <option>300L(Eng. Opt)</option>
                                            <option>400L</option>
                                            <option>500L(Sci. Opt)</option>
                                            <option>500L(Eng. Opt)</option>
                                        </select>
 								</select>
 							</div>
 							<div class="form-group">
 								<label>Semester</label>
 								<select class="form-control form-control-select custom-select" name="semester" required="">
 									<option value="HAMMIATIAN">HAMMIATIAN </option>
 									<option value="RAIN">RAIN</option>
 								</select>
 							</div>
 							<div class="form-group">
 								<input type="submit" name="ok" class="btn btn-danger" value="Update">
 							</div>
 						</form>
 									<?php
 								}
 								$stmt->closeCursor();
 							}
 						 ?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once 'libs/foot.php'; ?>
