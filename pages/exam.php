<?php 
	require_once 'db/db.php';
	// $a = array('A1','B2','B3','C4','C5','C6','D7','E8','F9');
	if (!isset($_SESSION['applicant']))
	 {
		header('location:apply.php');
		exit();
	}
	if (isset($_POST['ok-add'])) 
	{
		$exam_type = $_POST['exam-type'];
		$exam_number = $_POST['exam-num'];
		$grade_score1 = $_POST['grade_score1'];
		$grade_score2 = $_POST['grade_score2'];
		$grade_score3 = $_POST['grade_score3'];
		$grade_score4 = $_POST['grade_score4'];
		$grade_score5 = $_POST['grade_score5'];
		$subject1 = $_POST['subject1'];
		$subject2 = $_POST['subject2'];
		$subject3 = $_POST['subject3'];
		$subject4 = $_POST['subject4'];
		$subject5 = $_POST['subject5'];
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$exam_date = $day." ".$month. ", ".$year;		
		$error = array();
		if ($exam_type == "0")
		 {
			$error[] = "Examination type is required";
		}
		if (strlen($exam_number) > 10) 
		{
			$error[] = "Your examination number should not exceed 10 characters";
		}
		if (strlen($exam_number) != 10) 
		{
			$error[] = "Your examination number should be 10 characters not ".strlen($exam_number)." characters";
		}
		if (!preg_match("/[a-zA-Z]$/", $exam_number)) 
		{
			$error[] = "Your examination number should container characters at the end";
		}
		if (!preg_match("/^[0-9]/", $exam_number))
		 {
			$error[] = "Your examination number should beginning with digit number";
		}
		if ($day == "0") 
		{
			$error[] = "Day is required";
		}
		if ($month == "0") 
		{
			$error[] = "Month is required";
		}
		if ($year == "0") 
		{
			$error[] = "Year is required";
		}
		$error_count = count($error);
		if ($error_count == 0) 
		{
			$stmt = $db->prepare("INSERT INTO applicant_exam (application_id,exam_type,exam_number,exam_date,subject1,subject2,subject3,subject4,subject5,grade_score1,grade_score2,grade_score3,grade_score4,grade_score5,apply_date)VALUES(:application_id,:exam_type,:exam_number,:exam_date,:subject1,:subject2,:subject3,:subject4,:subject5,:grade_score1,:grade_score2,:grade_score3,:grade_score4,:grade_score5,:apply_date)");

			$stmt->execute(array(
				'application_id' => $_SESSION['applicant'],
				'exam_type' => $exam_type,
				'exam_number' => $exam_number,
				'exam_date' => $exam_date,
				'subject1' => $subject1,
				'subject2' => $subject2,
				'subject3' => $subject3,
				'subject4' => $subject4,
				'subject5' => $subject5,
				'grade_score1' => $grade_score1,
				'grade_score2' => $grade_score2,
				'grade_score3' => $grade_score3,
				'grade_score4' => $grade_score4,
				'grade_score5' => $grade_score5,
				'apply_date' => date('d M, Y')
				));

			$b = 	"<p>Thanks for applying for admission form</p>";
			$b .= '<p>Click <a href="print/print_form.php" target="_blank"> Here </a> to print your admission form</p>';
			set_flash($b,"info");
			header('location:exam.php');
			exit();
		}else{
			$msg = "$error_count error(s) occur while completing admission form. Please check the error below!";
			foreach ($error as $value) 
			{
				$msg.='<p>'.$value.'</p>';
			}
			set_flash($msg,'danger');
		}
		 // $stmt->closeCursor();
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admission Form &dash; Lautech Admin Portal, Osun State</title>
 	<?php require_once 'libs/css.php'; ?>
 </head>
 <body>
 	<?php require_once 'libs/menu.php'; ?>
 
 	<section id="section-body">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-7 col-md-7 col-md-offset-2 col-sm-12 col-xs-12">
 					<div class="profile-top">
 						<div class="solid-form"><span>O'Level Result</span></div>
 						<form class="form-group" method="post" role="form">
 							<?php flash(); ?>
 							<div class="row">

 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Full Name</label>
 										<div class="input-group">
 											<span class="input-group-addon" style="background-color: #eee;">
 												<i class="fa fa-user"></i>
 											</span>
 											<input type="text" name="name" class="form-control" readonly="" value="<?php echo @ucwords(applicant("surname"))." ".@ucwords(applicant("othername")); ?>">
 										</div>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Phone Number</label>
 										<div class="input-group">
 											<span class="input-group-addon" style="background-color: #eee;">
 												<i class="fa fa-phone"></i>
 											</span>
 											<input type="text" name="phone" class="form-control" readonly="" value="<?php echo @applicant('phone'); ?>">
 										</div>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Examinaton Type <span class="error-text">(required)</span></label>
 										<div class="input-group">
 											<span class="input-group-addon">
 												<i class="fa fa-level-up"></i>
 											</span>
 											<select class="form-control custom-select form-control-select" name="exam-type">
	 											<option value="0">-- Select exam type --</option>
	 											<option>WAEC</option>
	 											<option>NECO</option>
 											</select>
 										</div>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Examination Number <span class="error-text">(required)</span></label>
 										<div class="input-group">
 											<span class="input-group-addon">
 												<i class="fa fa-sort-numeric-asc"></i>
 											</span>
 											<input type="text" name="exam-num" class="form-control" required="" placeholder="Examination Number">
 										</div>
 									</div>
 								</div>

 								<div class="col-sm-4">
 									<div class="form-group">
 										<label>Exam Day <span class="error-text">(required)</span></label>
 										<div class="input-group">
 											<span class="input-group-addon">
 												<i class="fa fa-calendar"></i>
 											</span>
 											<select class="form-control form-control-select custom-select" name="day" required="">
 												<option value="0"> -- Select Day -- </option>
 												<?php 
 													$a = range(1, 31);
 													foreach ($a as $value) 
 													{
 														echo '<option>'.$value.'</option>';
 													}
 												 ?>
 											</select>
 										</div>
 									</div>
 								</div>

 								<div class="col-sm-4">
 									<div class="form-group">
 										<label>Exam Month <span class="error-text">(required)</span></label>
 										<div class="input-group">
 											<span class="input-group-addon">
 												<i class="fa fa-calendar"></i>
 											</span>
 											<select class="form-control-select  form-control custom-select" name="month" required="">
 												<option value="0"> -- Select Month -- </option>
 												<?php 
 													$a = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
 													foreach ($a as $value)
 													 {
 														echo '<option>'.$value.'</option>';
 													}
 												 ?>
 											</select>
 										</div>
 									</div>
 								</div>

 								<div class="col-sm-4">
 									<div class="form-group">
 										<label>Exam Year <span class="error-text">(required)</span></label>
 										<div class="input-group">
 											<span class="input-group-addon">
 												<i class="fa fa-calendar"></i>
 											</span>
 											<select class="form-control form-control-select custom-select" name="year" required="">
 												<option value="0"> -- Select Year -- </option>
 												<?php 
													$a =  range(1990, date('Y'));
													foreach ($a as $a)
													 {
														echo '<option>'.$a.'</option>';
													}
												 ?>
 											</select>
 										</div>
 									</div>
 								</div>
 								<div class="text-underline-bottom col-sm-12"><span>O'Level Grade</span></div>
 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="subject1">
 											<option>Mathematics</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="grade_score1">
 											<?php 
 												$a = array('A1','B2','B3','C4','C5','C6','D7','E8','F9');
 												foreach ($a as $value) 
 												{
 													echo '<option>'.$value.'</option>';
 												}
 											 ?>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="subject2">
 											<option>English Language</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="grade_score2">
 											<?php 
 												$a = array('A1','B2','B3','C4','C5','C6','D7','E8','F9');
 												foreach ($a as $value) 
 												{
 													echo '<option>'.$value.'</option>';
 												}
 											 ?>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="subject3">
 											<option>Physics</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="grade_score3">
 											<?php 
 												$a = array('A1','B2','B3','C4','C5','C6','D7','E8','F9');
 												foreach ($a as $value) 
 												{
 													echo '<option>'.$value.'</option>';
 												}
 											 ?>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="subject4">
 											<option>Biology</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="grade_score4">
 											<?php 
 												$a = array('A1','B2','B3','C4','C5','C6','D7','E8','F9');
 												foreach ($a as $value) 
 												{
 													echo '<option>'.$value.'</option>';
 												}
 											 ?>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="subject5">
 											<option>Chemistry</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<select class="form-control form-control-select" name="grade_score5">
 											<?php 
 												$a = array('A1','B2','B3','C4','C5','C6','D7','E8','F9');
 												foreach ($a as $value) 
 												{
 													echo '<option>'.$value.'</option>';
 												}
 											 ?>
 										</select>
 									</div>
 								</div>
 							</div>
 						<div class="form-group">
 							<input type="submit" name="ok-add" class="btn btn-primary" value="Submit">
 						</div>
 						</form>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>

 <?php require_once 'libs/js.php'; ?>
 </body>
 </html>
