<?php 
	$page_title = "Biodata Form";
	require_once '../db/db.php';
	if (!student_login()) 
	{
		header('location:login.php');
		exit();
	}
	if (isset($_POST['ok'])) 
	{
		$exam_type = $_POST['exam-type'];
		$exam_number = $_POST['exam-num'];
		$exam_dates = $_POST['exam-date'];
		$exam_month = $_POST['exam-month'];
		$exam_year = $_POST['exam-year'];
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
		$exam_date = $exam_dates.' '.$exam_month.','.$exam_year;
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$sex = $_POST['sex'];
		$date = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$state = $_POST['state'];
		$lga = $_POST['lga'];
		$town = $_POST['home-town'];
		$addr = $_POST['address'];
		$birth = $date.' '.$month.','.$year;
		$error = array();
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
		if (strlen($email) < 8) 
		{
			$error[] = 'Your email address should be at least 8 characters';
		}
		if (!is_numeric($phone) and strlen($phone) != 11) 
		{
			$error[] = 'Invalid phone number format';
		}
		if (strlen($lga) < 3) 
		{
			$error[] = 'Your local government should be at least 3 characters';
		}
		if (strlen($town) < 3) 
		{
			$error[] = 'Your home town should be at least 3 characters';
		}
		if (count($error) == 0) 
		{
			
			$stmt = $db->prepare("INSERT INTO exam (student_id,exam_type,exam_number,exam_date,subject1,subject2,subject3,subject4,subject5,grade_score1,grade_score2,grade_score3,grade_score4,grade_score5,add_date)VALUES(:student_id,:exam_type,:exam_number,:exam_date,:subject1,:subject2,:subject3,:subject4,:subject5,:grade_score1,:grade_score2,:grade_score3,:grade_score4,:grade_score5,:add_date)");

			$stmt->execute(array(
				'student_id' => student_detail('id'),
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
				'add_date' => date('d M, Y')
				));

			$ins = $db->prepare("INSERT INTO biodata (student_id,sex,birth,state,lga,town,addr)VALUES(:student_id,:sex,:birth,:state,:lga,:town,:addr)");
			
			$ins->execute(array(
				'student_id' => student_detail('id'),
				'sex' => $sex,
				'birth' => $birth,
				'state' => $state,
				'lga' => $lga,
				'town' => $town,
				'addr' => $addr
				));
		
		$up = $db->prepare("UPDATE students SET email =:email, phone =:phone WHERE id =:id");
		
		$up->execute(array(
			'email' => $email, 
			'phone' => $phone, 
			'id' => student_detail('id')
		));

		set_flash('Biodata has been successfully update','info');
		header('location:biodata.php');
		exit();

		}else{
			$msg = count($error).' error(s) occur while register for biodata form. Please check the error below!';
			foreach ($error as $value) 
			{
				$msg.='<p>'.$value.'</p>';
			}
			set_flash($msg,'danger');
		}
	}
	require_once '../libs/head.php';
	require_once '../libs/main-menu.php';
 ?>

 <section class="content-wrapper">
 	<div class="content-header">
 		<h1><?php echo $page_title; ?></h1>
 		<ol class="breadcrumb">
 			<li><a href="tmp.php">Student cPanel</a></li>
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
 						<?php flash(); ?>
 						<form class="form-group has-error" method="post" role="form">
 							
 							<h5 class="page-header">Student <?php echo $page_title; ?></h5>
 							<div class="row">
 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Full Name</label>
 										<input type="text" name="fname" class="form-control" readonly="" required="" value="<?php echo ucwords(student_details('fname')); ?>" required="" placeholder="Full Name">
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Email Address</label>
 										<input type="email" name="email" class="form-control" maxlength="100" value="<?php echo student_details('email'); ?>">
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Phone Number</label>
 										<input type="text" name="phone" class="form-control" maxlength="11" required="" value="<?php echo student_details('phone'); ?>">
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Department</label>
 										<select class="form-control form-control-select custom-select custom-select" name="dept" required="">
 											<option><?php echo student_details('dept'); ?></option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<label>Sex</label>
 										<select class="form-control form-control-select custom-select custom-select" name="sex" required="">
 											<option>Male</option>
 											<option>Female</option>
 										</select>
 									</div>
 								</div>
 									<div class="col-sm-3">
 									<div class="form-group">
 										<label>Date of Birth</label>
 										<div class="input-group date" data-provide="datepicker">
 										<input type="date" class="form-control" name="dob" value="<?php echo student_details('dob'); ?>">
    								     </div>
 								    </div>
 							</div>	    
 								

 							<div class="col-sm-4">
							<div class="form-group">
					 		<label>Country</label>
							
						<input type="text" name="country" class="form-control" maxlength="100" required="" placeholder="Enter your Country" maxlength="100" value="<?php echo student_details('country'); ?>">
									</div>
								</div>	
								<div class="col-sm-3">
									<div class="form-group">
 										<label>State</label>
 					<input type="text" name="state" class="form-control"  required="" placeholder="Enter Your State You are From" value="<?php echo student_details('state'); ?>" >
									</div>
								</div>		
 								
 								<div class="col-sm-4">
 									<div class="form-group" style="text-align: center;">
 										<label>Local Government</label>

												<input type="text" name="lga" class="form-control"  required="" placeholder="Enter your Local Government Area" value="<?php echo student_details('lga'); ?>">
 									</div>
 								</div>

 								<div class="col-sm-4">
 									<div class="form-group">
 										<label>Home Town </label>
 										<input type="text" name="town" class="form-control" maxlength="15" value="<?php echo student_details('hown_town'); ?>"  required="" placeholder="Home Town" maxlength="30">
 									</div>																									
 								</div>
 								<div class="col-sm-4">
 									<div class="form-group">
 										<label>Parmanent Home Address </label>
 										<input type="text" name="addr" class="form-control" maxlength="100" required="" placeholder="Parmanent Home Address" maxlength="100">
 									</div>
 								</div>
 								<div class="col-sm-4">
 								
 							</div>
 							<div class="col-sm-9 col-xs-6 col-md-5 col-lg-9	form-group">	
 								<div class="col-sm-12">
 									<h5 class="page-header">Examination Details</h5>
 								</div>
 							<div class="col-sm-3">
 									<div class="form-group">
 										<label>Examination Type</label>
 										<select class="form-control form-control-select custom-select custom-select" name="exam-type" required="" value="<?php echo student_details('exam-type'); ?>"	>
 											<option>Neco</option>
 											<option>Waec</option>
 											<option>Nabteb</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-4">
 									<div class="form-group">
 										<label>Examination Number</label>
 										<input type="text" name="exam-num" maxlength="10" class="form-control" required="" placeholder="Examination Number eg (50657409ic)" value="<?php echo student_details('exam-num'); ?>">
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<label>Examination Date</label>
 										<div class="input-group date" data-provide="datepicker">
 										<input type="date" name="exam_date"   class="form-control">
    								     </div>
 									</div>
 								</div>		
 								 
								
								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="subject1" required="">
 											<option>Mathematics</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="grade_score1" required="">
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

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="subject2" required="">
 											<option>English Language</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="grade_score2" required="">
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

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="subject3">
 											<option>Physics</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="grade_score3">
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

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="subject4" required="">
 											<option>Biology</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="grade_score4" required="">
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

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="subject5" required="">
 											<option>Chemistry</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="grade_score5" required="">
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
 															<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="subject6" required="">
 											<option>Mathematics</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="grade_score6" required="">
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
 					</div>			

 							<div class="form-group">
 								<label>Home Address</label>
 								<textarea class="form-control" name="address" required="" placeholder="Home Address"><?php echo @$_POST['address']; ?></textarea>
 							</div>
 							<div class="form-group">
 								<input type="submit" name="ok" class="btn btn-info" value="Submit">
 							</div>
 						</form>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once '../libs/foot.php'; ?>
