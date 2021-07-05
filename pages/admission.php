<?php 
	require_once '../db/db.php'; 
	if (isset($_POST['ok'])) 
	{
		$jamb_reg = $_POST['name'];
		$phone = $_POST['phone'];
		$stmt = $db->prepare("SELECT jamb_reg FROM applicant_form WHERE jamb_reg=:jamb_reg and phone=:phone");
		$stmt->execute(array('jamb_reg' => $jamb_reg, 'phone' => $phone));
		if ($stmt->rowCount() == 0) 
		{
			set_flash('Invalid login details','danger');
			header('location:admission.php');
			exit();
		}else{
			$_SESSION['admission'] = $jamb_reg;
			header('location:tmp.php');
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admission Login &dash; LAUTECH-ADMISSION STATUS</title>
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
									<h4 class="panel-title">Please Sign In</h4>
								</div>
								<div class="panel-body">
									<?php flash(); ?>
									<form class="form-group" method="post" role="form">
										<div class="form-group">
											<label>Jamb Reg. No./Form No.</label>
											<div class="input-icon input-user">
												<input type="text" name="name" class="form-control" required="" placeholder="Jamb Reg. No./Form No.">
											</div>
										</div>
										<div class="form-group">
											<label>Phone Number</label>
											<div class="input-icon input-pass">
												<input type="text" name="phone" class="form-control" required="" placeholder="Phone Number">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" name="ok" class="btn btn-primary" value="Login">
											<div class="pull-right">
												<a href="admission_password.php" class="btn btn-outline-blue"><i class="fa fa-key"></i> Forget Your Password/Transaction (ID)</a>
											</div>
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