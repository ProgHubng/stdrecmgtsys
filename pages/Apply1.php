<?php 
	$page_title = "Registration Form";
	require_once '../db/db.php';
	if (!apply_login()) 
	{
		header('location:login.php');
		exit();
	}
	if (isset($_POST['ok'])) 
	{
		
		$exam_type = $_POST['exam_type'];
		$exam_number = $_POST['exam_number'];
		$exam_date = $_POST['exam_date'];
		$grade_score1 = $_POST['grade_score1'];
		$grade_score2 = $_POST['grade_score2'];
		$grade_score3 = $_POST['grade_score3'];
		$grade_score4 = $_POST['grade_score4'];
		$grade_score5 = $_POST['grade_score5'];
		$grade_score6 = $_POST['grade_score6'];
		$grade_score7 = $_POST['grade_score7'];
		$grade_score8 = $_POST['grade_score8'];
		$subject1 = $_POST['subject1'];
		$subject2 = $_POST['subject2'];
		$subject3 = $_POST['subject3'];
		$subject4 = $_POST['subject4'];
		$subject5 = $_POST['subject5'];
		$subject6 = $_POST['subject6'];
		$subject7 = $_POST['subject7'];
		$subject8 = $_POST['subject8'];
		$type_programme=$_POST['type_programme'];
		$sex = $_POST['sex'];
		$dob = $_POST['dob'];
		$state = $_POST['state'];
		$lga = $_POST['lga'];
		$town = $_POST['town'];
		$addr = $_POST['addr'];
		$dob = $_POST['dob'];
		$country=$_POST['country'];
		$dept=$_POST['dept'];
		$faculty=$_POST['faculty'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$level=$_POST['level'];
		$fname=$_POST['fname'];
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
		if ($lga="") 
		{
			$error[] = 'Please choose local government it cant be empty';
		}
		if (strlen($town) < 3) 
		{
			$error[] = 'Your home town should be at least 3 characters';
		}
		if ($type_programme=='Regular') {
			$matric_no= date('y').str_pad(apply_detail('id'),4,0, STR_PAD_LEFT);
		}else{
			$matric_no= "PT".date('y').str_pad(apply_detail('id'),4,0, STR_PAD_LEFT);
		}
		if ($state=""){
			$error[]='Please choose your state';
		}
		if (isset($_FILES['upl'])) 
		{
			$files = $_FILES['upl'];
			$allowed = array('jpg','png','jpeg');
			$name = $_FILES['upl']['name'];
			$n = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
			if ($name == "") 
			{
				$error[] = 'Your image is required';
			}else{
				if (!in_array($n, $allowed)) 
				{
					$error[] = 'Only jpeg png, and jpg format is allowed';
				}else{
					if ($files['size']  > 1024 * 1024 * 1) 
					{
						$error[] = 'Maximum file upload is 1MB';
					}
				}
			}
			$folder = '../images/';
			$t = uniqid().$name;
			$destination = $folder.$t;
		}
		if (count($error) == 0) 
		{
			if (move_uploaded_file($_FILES['upl']['tmp_name'], $destination)) {	
			$stmt = $db->prepare("UPDATE application SET matric_no=:matric_no,upl=:upl,fname=:fname,email=:email,phone=:phone,sex=:sex,dob=:dob,country=:country,state=:state,lga=:lga,town=:town,addr=:addr,faculty=:faculty,dept=:dept,level=:level,session=:session,semester=:semester,type_programme=:type_programme,exam_type=:exam_type,exam_number=:exam_number,exam_date=:exam_date,subject1=:subject1,subject2=:subject2,subject3=:subject3,subject4=:subject4,subject5=:subject5,subject6=:subject6,subject7=:subject7,subject8=:subject8,grade_score1=:grade_score1,grade_score2=:grade_score2,grade_score3=:grade_score3,grade_score4=:grade_score4,grade_score5=:grade_score5,grade_score6=:grade_score6,grade_score7=:grade_score7,grade_score8=:grade_score8 WHERE email =:email");
				$stmt->execute(array(
				'matric_no' =>$matric_no,
				'upl'=>$t,
				'fname'=>$fname,
				'email'=>$email,
				'phone'=>$phone,
				'sex' => $sex,
				'dob' => $dob,
				'country'=>$country,
				'state' => $state,
				'lga' => $lga,
				'town' => $town,
				'addr' => $addr,
				'faculty'=>$faculty,
				'dept'=>$dept,
				'level'=>$level,
				'session'=>date('Y')-1./date('Y'),
				'semester'=>'HARMATTAN',
				'type_programme'=>$type_programme,
				'exam_type' => $exam_type,
				'exam_number' => $exam_number,
				'exam_date' => $exam_date,
				'subject1' => $subject1,
				'subject2' => $subject2,
				'subject3' => $subject3,
				'subject4' => $subject4,
				'subject5' => $subject5,
				'subject6' => $subject6,
		 		'subject7' => $subject7,
		 		'subject8' => $subject8,
		 		'grade_score1' => $grade_score1,
		 		'grade_score2' => $grade_score2,
		 		'grade_score3' => $grade_score3,
				'grade_score4' => $grade_score4,
		 		'grade_score5' => $grade_score5,
		 		'grade_score6' => $grade_score6,
		 		'grade_score7' => $grade_score7,
		 		'grade_score8' => $grade_score8
		));
	 		set_flash('Your Registration successfully Completed,please Login with your Matric No and Password','info');
	 header('location:admited_print.php');
	 exit();
	}
			 }else{
		 	$msg = count($error).' error(s) occur while register for biodata form. Please check the error below!';
		 	foreach ($error as $value) 
			{
		 		$msg.='<p>'.$value.'</p>';
		 	}
		set_flash($msg,'danger');
		 // header('location:app_webpay.php');
		}
	
	}

	require_once '../libs/head.php';
	// require_once '../libs/menu.php';

	//var_dump($_SESSION['apply']);
 ?>
 <section class="content-wrapper">
 	<script type="text/javascript">
      function showDept(Faculty_name){ 
      	//document.form.submit();
      }

      function showState(country_name){
        // body...
        //document.form.submit();
        //fetch_state(country_id);
      }
      function showCity(state_name) {
        // body...
        //document.form.submit();
      }
            

      
    </script>
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
 						<form class="form-group has-error" method="POST" role="form" name="form" enctype="multipart/form-data">
 						<h5 class="page-header">Student <?php echo $page_title; ?></h5>
 							<div class="row">
 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Full Name</label>
 										<input type="text" name="fname" class="form-control"   required="" placeholder="Full Name">
 									</div>
 								</div>

 								<div class="col-sm-6">
 									<div class="form-group">
 										<label>Email Address</label>
 										<input type="email" name="email" class="form-control" maxlength="100" placeholder="Email Address">
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<label>Phone Number</label>
 										<input type="text" name="phone" class="form-control" maxlength="11" required="" placeholder="Phone number " >
 									</div>
 								</div>
 	
 								<div class="col-sm-2">
 									<div class="form-group">
 										<label>Type of Programme</label>
 										<select class="form-control form-control-select custom-select" name="type_programme" required="" placeholder="Programme" >
 											<option>Regular</option>
 											<option>Part Time</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-5">
 									<div class="form-group">
 										<label>Faculty</label>
 										<select class="form-control form-control-select custom-select" name="faculty" required="" id="Faculty_name"   >
 									 <option value="">-------Select Faculty -------</option>
										<?php
										$sql = $db->prepare("SELECT * FROM faculty");
 											$sql->execute();
											while ($rs = $sql->fetch()) 
											{
	 										?>
<option value="<?php echo $rs["Faculty_name"]; ?>" ><?php echo $rs["Faculty_name"]; ?></option>
<?php
}
?>
												</select>	
									</div>
								</div>	
									
 								<div class="col-sm-5">
 									<div class="form-group">
 										<label>Department</label>

 										<select class="form-control form-control-select custom-select " name="dept" required="">
 											<?php
										$sql = $db->prepare("SELECT * FROM dept");
 											$sql->execute();
											while ($rs = $sql->fetch()) 
											{
	 										?>
<option value="<?php echo $rs["Dept_Name"]; ?>"><?php echo $rs["Dept_Name"]; ?></option>
<?php
}
?>
												</select>	
 									
									</div>
								</div>						
	
								<div class="col-sm-2">
 									<div class="form-group">
 										<label>Level</label>
 										<select class="form-control form-control-select custom-select" name="level" required="" placeholder="Programme" >
 											<option value="100L">100L</option>
 											<option value="200L">200L</option>
 											<option value="300L(Sci. Opt.)">300L(Sci. Opt)</option>
 											<option value="300L(Eng. Opt.)">300L(Eng. Opt)</option>
 											<option value="400L">400L</option>
 											<option value="500L(Sci. Opt.)">500L(Sci. Opt)</option>
 											<option value="500L(Eng. Opt.)">500L(Eng. Opt)</option>
 										</select>
 									</div>
 								</div>
 	
 								<div class="col-sm-3">
 									<div class="form-group">
 										<label>Sex</label>
 										<select class="form-control form-control-select custom-select" name="sex" required="" placeholder="Gender" >
 											<option>Male</option>
 											<option>Female</option>
 										</select>
 									</div>
 								</div>
							
 							 <div class="col-sm-3">
 									<div class="form-group">
 										<label>Date of Birth</label>
 										<div class="input-group date" data-provide="datepicker">
 										<input type="date" class="form-control" name="dob">
    								     </div>
 								    </div>
 							</div>	    	
 								
 							<div class="col-sm-4">
							<div class="form-group">
					 		<label>Country</label>
							
						<input type="text" name="country" class="form-control" maxlength="100" required="" placeholder="Enter your Country" maxlength="100">
									</div>
								</div>	
								<div class="col-sm-4">
									<div class="form-group">
 										<label>State</label>
 					<input type="text" name="state" class="form-control"  required="" placeholder="Enter Your State You are From" >
									</div>
								</div>		
 								
 								<div class="col-sm-4">
 									<div class="form-group" style="text-align: center;">
 										<label>Local Government</label>

												<input type="text" name="lga" class="form-control"  required="" placeholder="Enter your Local Government Area">
 									</div>
 								</div>

 								<div class="col-sm-4">
 									<div class="form-group">
 										<label>Home Town </label>
 										<input type="text" name="town" class="form-control" maxlength="15" value="<?php echo@$_POST['home_town']; ?>"  required="" placeholder="Home Town" maxlength="30">
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
 								<div class=" col-lg-12  col-md-12 col-sm-12 col-xs-12">
 								<div class="col-sm-12">
 									<h5 class="page-header">O'Level Examination Details</h5>
 								</div>
 								<div class="col-sm-3">
 									<div class="form-group">
 										<label>Examination Type</label>
 										<select class="form-control form-control-select custom-select custom-select" name="exam_type" required="">
 											<option>Neco</option>
 											<option>Waec</option>
 											<option>Nabteb</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<label>Examination Number</label>
 										<input type="text" name="exam_number" maxlength="10" class="form-control" required="" placeholder="Examination Number eg (50657409ic)">
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
 								<div class="col-md-12 col-sm-12 col-xs-12">
 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select  custom-select" name="subject1" required="">
 											<option>Mathematics</option>
 										</select>
 									</div>
 								</div>			
								

 								<div class="col-sm-3 ">
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
 											<option>Agriculture</option>
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

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="subject7" required="">
 											<option>Geograph</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="grade_score7" required="">
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
 										<select class="form-control form-control-select custom-select" name="subject8" required="">
 											<option>Economics</option>
 										</select>
 									</div>
 								</div>

 								<div class="col-sm-3">
 									<div class="form-group">
 										<select class="form-control form-control-select custom-select" name="grade_score8" required="">
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
 							</div> <br>
 							<div class="col-sm-12">
 							<div class="pull-left">
						<label>Attach Your Image <span class="error-text">(Here)</span></label>
            			<div id="image-preview" class="w-100" style="height: 200px; background-image: url('image/5a1fdc70eee14.avatar5.png');">
                       <label for="image-upload" id="image-label">Choose File</label>
                       <input type="file" name="upl" accept="image/*" id="image-upload">
                   </div> 
 								<div class="form-group pull-left">
 								<input type="submit" name="ok" class="btn btn-info" value="Submit">
 							</div>
 								</div>
 							</div>
 						
	
		 						</form>
</div>
</div>

		 						
					
					</div>
				</div>
 					</div>	
 				</div>
 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once '../libs/foot.php'; ?>
