<?php 
	require_once '../db/db.php'; 
	if (isset($_POST['ok'])) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$stmt = $db->prepare("SELECT username FROM admin WHERE username=:username and password=:password");
		$stmt->execute(array('username' => $username,'password' => $password));
		if ($stmt->rowCount() == 1) 
		{
			$_SESSION['admin'] = $username;
			header('location:dashboard.php');
			exit();
		}else{	
			set_flash('Invalid login details','danger');
			header('location:index.php');
			exit();
		
			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lautech Admin Portal</title>
	<!-- meta tags -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no shrink-to-fit=no">
<meta charset="utf-8">
<!-- css -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../css/styles.css">
<link rel="stylesheet" type="text/css" href="../css/style-theme-min.css">
<!-- google font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="icon" href="../images/log.png">
</head>
<body>
	<div class="bg-img-ovarlay">
		<img src="../images/bigPic.jpg">
	</div>
	<div id="bg-dark-ovarlay"></div>
	<section id="section-body">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
					<div class="dark-ovarlay-box mb-tx">
								<form class="form-group has-warning" method="post" role="form">
									<h5 class="page-header text-white">Admin Login</h5>
									<?php flash(); ?>
									<div class="form-group">
										<label>Username</label>
										<div class="input-icon input-user">
											<input type="text" name="username" class="form-control" placeholder="Username">
										</div>
									</div>

									<div class="form-group">
										<label>Password</label>
										<div class="input-icon input-pass">
											<input type="password" name="password" class="form-control" required="" placeholder="Password">
										</div>
									</div>

									<div class="form-group">
										<input type="submit" name="ok" class="btn btn-white" value="Login">
									</div>
									<div class="form-group">
										<a href="admin_password.php">Forgotten Password</a>
									</div>

								</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>	