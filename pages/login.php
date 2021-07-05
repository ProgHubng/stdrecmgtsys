<?php 
	require_once '../db/db.php'; 
	if (isset($_POST['ok'])) 
	{
		$matric_no = $_POST['matric-no'];
		$password = $_POST['password'];
		// var_dump($_POST);
		// exit();
		$stmt = $db->prepare("SELECT matric_no FROM application WHERE matric_no =:matric_no and password =:password");
		$stmt->execute(array('matric_no' => $matric_no,'password' => $password));
		if ($stmt->rowCount() == 0) 
		{
			set_flash('Invalid credential login details','danger');
			header('location:login.php');
			exit();
		}else{
			$_SESSION['student'] = $matric_no;
			header('location:tmp.php');
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student ePortal &dash; Login</title>
	<?php require_once '../libs/css.php'; ?>
</head>
<body>
		<?php require_once '../libs/menu.php'; ?>
	<section id="section-body">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		 <div class="bg-img-ovarlay1">
		
		<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
						<div class="profile-top mb-top-up">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">Student ePortal &dash; Login</h4>
								</div>
								<div class="panel-body">
									<?php flash(); ?>
									<form class="form-group" method="post" role="form">
										<div class="form-group">
											<label for="matric-number">Matric Number</label>
											<div class="input-icon input-user">
												<input type="text" name="matric-no" required="" id="matric-no" class="form-control" placeholder="Matric Number">
											</div>
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<div class="input-icon input-pass">
												<input type="password" name="password" id="password" class="form-control" required="" placeholder="Password">
											</div>
										</div>

										<div class="form-group">
											<input type="submit" name="ok" id="ok" class="btn btn-primary" value="Login">
										</div>
										<div class="form-group">
											<a href="matric_forgotten.php">Forgotten Password</a>
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
