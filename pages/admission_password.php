<?php 
	require_once 'db/db.php'; 
	if (isset($_POST['ok']))
	 {
		$application_no = $_POST['name'];
		$surname = $_POST['surname'];
		$stmt = $db->prepare("SELECT application_no FROM applicant_form WHERE application_no=:application_no and surname=:surname");
		$stmt->execute(array('application_no' => $application_no, 'surname' => $surname));
		if ($stmt->rowCount() == 0) 
		{
			set_flash("Invalid login details","danger");
			header('location:admission_password.php');
			exit();
		}else{
			$_SESSION['application_no'] = $application_no;
			header('location:change.php');
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admission &dash; Lautech Admin Portal, Osun State</title>
	<?php require_once 'libs/css.php'; ?>	
</head>
<body>
	<?php require_once 'libs/menu.php'; ?>

	<section id="section-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
					<div class="profile-top mb-top-up">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">
									Forgot Password/Transaction ID
									<div class="pull-right">
										<a href="admission.php" style="color: #fff;"><i class="fa fa-sign-in"></i> Login Here</a>
									</div>
								</h4>
								</div>
								<div class="panel-body">
									<?php flash(); ?>
									<form class="form-group" method="post" role="form">
										<div class="form-group">
											<label>Application No.</label>
											<div class="input-icon input-phone">
												<input type="text" name="name" class="form-control" required="" placeholder="Supply Your Application No.">
											</div>
										</div>
										<div class="form-group">
											<label>Surname</label>
											<div class="input-icon input-user">
												<input type="text" name="surname" class="form-control" required="" placeholder="Supply Your Surname">
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

<?php require_once 'libs/js.php'; ?>
</body>
</html>