<?php 
	require_once '../db/db.php'; 
	app_webpay();
	if (isset($_POST['ok']))
	 {
		$payment_otp = $_POST['otp'];
		$error = array();
		if (!is_numeric($payment_otp))
		 {
			$error []= "Invalid One-Time-Password, it should be only digit number";
		}
		if (strlen($payment_otp) > 4) 
			{
				$error []="Invalid One-Time-Password, it should not exceed 4 digit number";
			}
		if (strlen($payment_otp) != 4) 
			{
			$error []= "One-Time-Password, it should be digit number not ".strlen($payment_otp)." digit number ";
			}
		 if (count($error) == 0) 
		{	
					$stmt = $db->prepare("UPDATE app_payment SET payment_otp=:payment_otp, payment_status=:payment_status WHERE email=:email");
					$stmt->execute(array(
							'payment_otp' => 1,
							'payment_status' => 1,
							'email' => $_SESSION['app_payment']
						));
					// unset($_SESSION['payment']);
					set_flash("Your payment transaction has been successfully complete, login to Continue your registered ","info");
					header('location:apply1.php');
					exit();
				}else{
					$msg = count($error).' error(s) occur while Register. Please check the error below!';
			foreach ($error as $value) 
			{
				$msg.='<p>'.$value.'</p>';
			}
			set_flash($msg,'danger');
			header('location:otp1.php');
				exit();
		}
		$stmt->closeCursor();	
		var_dump('payment');	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WebPay</title>
		<!-- meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no shrink-to-fit=no">
<meta charset="utf-8">
<!-- Css -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../css/css.css">
<link rel="stylesheet" type="text/css" href="../css/style-theme-min.css">
<!-- google font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
<link rel="icon" href="../images/logo.preview2.png" style="width: 55px; height: 45px;">
</head>
<body>

	<section id="section-body">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
					<?php flash(); ?>
					<div class="panel panel-primary" style=" box-shadow:0 0 3px #222;">
						<div class="panel-heading">
							<div class="panel-title" style="margin-bottom: 10px; margin-top: 10px;">
									<span>WebPay</span> 
									<img src="../images/logo.preview.png" style="width: 10px; height: 15px; ">
								</div>
						</div>
						<div class="panel-body" style="background-color: #eee;">
							<div class="solid-pay"><span><i class="glyphicon glyphicon-user"></i> <?php echo ucwords(apply_detail("fname"))," <i class=\"fa fa-phone\"></i> ",apply_detail("phone"); ?></span>
							</div>	
							<div class="pay-otp-box">
								<p>
									<i class="glyphicon glyphicon-ok-sign"></i>  <span>Your bank requires that you enter One-Time-Password (OTP) that has been sent to your registered phone number (<?php echo str_replace(apply_detail("phone"),81,"+234"),substr(apply_detail("phone"), -9); ?>). If you do not receive your (OTP) within 1 minute Send OTP 1828 as a text message to the number 30010 in order  to receive your token.</span>
								</p>
							</div>
							<form class="form-group" method="post">
								<div class="row">
									<div class="col-sm-4 col-sm-offset-4 col-xs-12">
										<div class="form-group">
											<input type="text" name="otp" class="form-control mt" id="otp" required="" placeholder="One-Time-Password (OTP)">
										</div>
										<div class="form-group">
											<input type="submit" name="ok" class="btn btn-danger btn-block" value="Continue">
											<div class="form-group">
												<center><a href="#" style="text-decoration: underline;">Cancel</a></center>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="panel-footer">
							<img src="../images/payments-icons.png"> <span class="pull-right text-size text-m-left">&copy; Copyright Interswtich Limited.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/min.js"></script>
</body>
</html>