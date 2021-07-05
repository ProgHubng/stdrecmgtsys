<?php 
	require_once '../db/db.php'; 
	if (isset($_POST['ok'])) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		/*$stmt = $db->prepare("SELECT email,password FROM application WHERE email=:email and password=:password");
		$stmt->execute(array('email' => $email,'password' => $password));
		if ($stmt->rowCount() == 0) 
			{
		set_flash('Invalid credential login details','danger');
		header('location:proceeding.php');
		exit();
		}else{
			// $_SESSION['apply'] =$email;
			header('location:app_webpay.php');
			exit();
		}*/

		$sql = $db->prepare("SELECT * FROM application WHERE email=:email and password=:password");
		$sql->execute(array(
			'email'=>$email,
			'password'=>$password
		));

		$num_row = $sql->rowCount();

		if ($num_row == 0) {
			set_flash("Invalid credential login details","danger");
		}else{
			$_SESSION['apply'] = $email;
			header("location:app_webpay.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lautech ePortal &dash; Login</title>
	<?php require_once '../libs/css.php'; ?>
	<?php require_once '../libs/menu.php'; ?>

	<section id="section-body">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<!--  <div class="bg-img-ovarlay1"> -->
		<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
						<div class="profile-top mb-top-up">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title">Lautech Student ePortal &dash; Login</h4>
								</div>
								<div class="panel-body">
									<?php flash(); ?>
									<form class="form-group" method="POST" role="form">
										<div class="form-group">
											<label for="matric-number">Email / Phone</label>
											<div class="input-icon input-user">
												<input type="text" name="email" required="" id="email" class="form-control" placeholder="Email/Phone">
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
									</form>
								</div>
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
