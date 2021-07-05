<?php 
	require_once '../db/db.php';
	if (!isset($_SESSION['email']))
	 {
		header('location:admin_password.php');
		exit();
	}
	if (isset($_POST['ok']))
	 {
	 	$matric_no=$_POST['matric_no'];
		$password = $_POST['password'];
		$rpassword = $_POST['rpassword'];
		$error = array();
		$stmt = $db->prepare("SELECT NULL FROM application WHERE password=:password");
		$stmt->execute(array('password' => $password));
		if ($stmt->rowCount() >= 1) 
		{
			$error[] = "You can't use old password";
		}
		if (strlen($password) < 5) 
		{
			$error[] = 'Password should not exceed 5 characters';
		}
		if (strlen($rpassword) < 5) 
		{
			$error[] = 'Retype password should be at least 5 characters';
		}
		if ($password != $rpassword) 
		{
			$error[] = 'Password did not match retype password';
		 }
		$error_count = count($error);
		if ($error_count == 0) 
		{
			$stmt = $db->prepare("UPDATE application SET password=:password WHERE email=:email or matric_no=:matric_no");
			$stmt->execute(array('password' => $password, 'email' => $_SESSION['email'], 'matric_no' =>$matric_no));
			unset($_SESSION['email']);
			set_flash('Password has been change successfully','info');
			header('location:index.php');
			exit();
		}else{
			$msg = "$error_count error(s) occur while changing your mobile number. Please check the error below!";
			foreach ($error as $value) 
			{
				$msg.='<p>'.$value.'</p>';
			}
			set_flash($msg,"danger");
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password. &dash; Ladoke Akintola University ogbomosho </title>
	<?php require_once '../libs/css.php'; ?>	
</head>
<body>
	<?php require_once '../libs/menu.php'; ?>

	<section id="section-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
					<div class="profile-top mb-top-up">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h5 class="panel-title">Change Mobile No.</h5>
							</div>
							<div class="panel-body">
								<?php flash(); ?>
								<form class="form-group" method="post" role="form">
									<div class="form-group">
										<label>New Password.</label>
										<div class="input-icon input-phone">
											<input type="text" name="password" class="form-control" required="" placeholder="Enter New Password.">
										</div>
									</div>

									<div class="form-group">
										<label>Retype New Password</label>
										<div class="input-icon input-phone">
											<input type="text" name="rpassword" class="form-control" required="" placeholder="Retype New Password.">
										</div>
									</div>

									<div class="form-group">
										<input type="submit" name="ok" class="btn btn-primary" value="Reset Password">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php require_once '../libs/js.php'; ?>
</body>
</html>