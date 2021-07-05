<?php 
	require_once '../db/db.php'; 
	if (isset($_POST['ok']))
	 {
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$fname = $_POST['fname'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$error = array();

		if (strlen($fname) < 10) 
		{
			$error[] = 'Full name should be at least 10 characters';
		}
		if (strlen($password) < 5) 
		{
			$error[] = 'Password should not exceed 5 characters';
		}
		if (strlen($cpassword) < 5) 
		{
			$error[] = 'Retype password should be at least 5 characters';
		}
		if ($password != $cpassword) 
		{
			$error[] = 'Password did not match retype password';
		 }
		 $stmt = $db->prepare("SELECT email FROM application WHERE email=:email ");
		$stmt->execute(array('email' => $email));
		if ($stmt->rowCount() >= 1) 
			{
				$error[] ='Sorry, you cant make use of the Email, Because it already been used by another person';
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
			
				$stmt = $db->prepare("INSERT INTO application (matric_no,upl,fname,password,email,phone,sex,dob,country,state,lga,town,addr,faculty,dept,level,session,semester,type_programme,exam_type,exam_number,exam_date,subject1,subject2,subject3,subject4,subject5,subject6,subject7,subject8,grade_score1,grade_score2,grade_score3,grade_score4,grade_score5,grade_score6,grade_score7,grade_score8,add_date)VALUES(:matric_no,:upl,:fname,:password,:email,:phone,:sex,:dob,:country,:state,:lga,:town,:addr,:faculty,:dept,:level,:session,:semester,:type_programme,:exam_type,:exam_number,:exam_date,:subject1,:subject2,:subject3,:subject4,:subject5,:subject6,:subject7,:subject8,:grade_score1,:grade_score2,:grade_score3,:grade_score4,:grade_score5,:grade_score6,:grade_score7,:grade_score8,:add_date)");
				$stmt->execute(array(
					'matric_no'=>0,
					'upl'=>0,
					'fname' => $fname,
					'password' => $password,
					'email' => $email,
					'phone' => $phone,
					'sex' => 0,
					'dob' => 0,
					'country'=>0,
					'state' => 0,
					'lga' => 0,
					'town' => 0,
					'addr' => 0,
					'faculty'=>0,
					'dept'=>0,
					'level'=>0,
					'session'=>0,
					'semester'=>0,
					'type_programme'=>0,
					'exam_type' => 0,
					'exam_number' => 0,
					'exam_date' => 0,
					'subject1' => 0,
					'subject2' => 0,
					'subject3' => 0,
					'subject4' => 0,
					'subject5' => 0,
					'subject6' => 0,
					'subject7' => 0,
					'subject8' => 0,
					'grade_score1' => 0,
					'grade_score2' => 0,
					'grade_score3' => 0,
					'grade_score4' => 0,
					'grade_score5' => 0,
					'grade_score6' => 0,
					'grade_score7' => 0,
					'grade_score8' => 0,
					'add_date' => date('d M, Y')
					));
				set_flash('Your successfully registered, try to login','info');
				header('location:proceeding.php');
				exit();
		}else{
			$msg = count($error).' error(s) occur while Register. Please check the error below!';
			foreach ($error as $value) 
			{
				$msg.='<p>'.$value.'</p>';
			}
			set_flash($msg,'danger');
			header('location:apply.php');
				exit();
		}
		$stmt->closeCursor();		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration &dash; Lautech </title>
	<?php require_once '../libs/css.php'; ?>
	<?php require_once '../libs/menu.php'; ?>
<section id="section-body">
		<div class="container">
			<div class="row"> 
				<br>
				<div class="col-lg-9 col-sm-offset-1 col-md-7 col-sm-12 col-xs-12">
							<p style="color: red; text-align: center;" 	><b>NOTE!!!</b> Please fill out all place you find this (*) and Provide accurate information such as functioning Email address, Password that you can remember for future purpose.</p>
				</div>			
					<form class="form-group has-error" method="post" role="form" enctype="multipart/form-data">
					<div class="col-lg-9 col-sm-offset-1 col-md-7 col-sm-12 col-xs-12">
						<div class="profile-top">
							<?php flash(); ?>
							<div class="solid-form" style="text-align: center;"><span>Registration</span></div>		
									<div class="col-sm-6">
										<div class="form-group">
											<label for="surname">Full Name <span class="error-text">(*)</span></label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-user"></i>
												</span>
												<input type="text" name="fname" maxlength="30" value="<?php echo@$_POST['fname']; ?>" class="form-control" required="" placeholder="Full Name">
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label>Password <span class="error-text">(*)</span></label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="password" name="password" maxlength="15" value="<?php echo@$_POST['password']; ?>" class="form-control" required="" placeholder="*****">
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
										<label>Retype Password <span class="error-text">(*)</span></label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-key"></i>
											</span>
											<input type="password" name="cpassword" value="<?php echo@$_POST['cpassword']; ?>" maxlength="15" class="form-control" required="" placeholder="*****">
										</div>
									</div>

									</div>

									<div class="col-sm-6">
										<div class="form-group">
										<label for="email">Email Address <span class="error-text">(*)</span></label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-envelope-o"></i>
											</span>
											<input type="email" name="email" maxlength="100" value="<?php echo @$_POST['email']; ?>" class="form-control" required="" placeholder="Email Address">
										</div>
									</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
										<label for="phone-number">Phone Number <span class="error-text">(*)</span></label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-phone"></i>
											</span>
											<input type="text" name="phone" value="<?php echo@$_POST['phone']; ?>" maxlength="11" class="form-control" required="" placeholder="Phone Number">
										</div>
									</div>
									</div>
									<div class="col-md-7 col-sm-6  ">
										<div class="form-group">
									<div class="">
										<input type="submit" name="ok" class="btn btn-primary" value="Submit">
										<div class="col-md-7 col-sm-6  ">
										<div class="form-group">
									
									</div>
								</div>
									</div>

									

			</div>
		</div>

			</form>
			</div>
		</div>
	</section>

<?php require_once '../libs/js.php'; ?>
</body>
</html>
