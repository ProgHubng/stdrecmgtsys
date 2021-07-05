<?php 
	require_once '../db/db.php'; 
	if (isset($_POST['ok']))
	 {
	 	
		$email= $_POST['email'];
		$phone = $_POST['phone'];
		$stmt = $db->prepare("SELECT email, phone, FROM application WHERE email=:email and phone=:phone ");
		$stmt->execute(array('email' => $email, 'phone' => $phone));
		if ($stmt->rowCount() == 0) 
		{
			set_flash("Invalid login details","danger");
			header('location:forgotten_password.php');
			exit();
		}else{
			$_SESSION['email'] = $email;
			header('location:change.php');
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student portal &dash; Lautech </title>
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
									<h4 class="panel-title">
									Forgot Password
									<div class="pull-right">
										<a href="index.php" style="color: #fff;"><i class="fa fa-sign-in"></i> Login Here</a>
									</div>
								</h4>
								</div>
								<div class="panel-body">
									<?php flash(); ?>
									<form class="form-group" method="post" role="form">
										<div class="form-group">
											<label>Email</label>
											<div class="input-icon input-phone">
												<input type="text" name="email" class="form-control" required="" placeholder="Supply Your Email address">
											</div>
										</div>
										<div class="form-group">
											<label>Phone</label>
											<div class="input-icon input-user">
												<input type="text" name="phone" class="form-control" required="" placeholder="Supply Your Phone">
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
</html>|