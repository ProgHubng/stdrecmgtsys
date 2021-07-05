<?php 
	require_once '../db/db.php';
	webpay();
	if (isset($_POST['ok-pay']))
	 {
		$payment_type = $_POST['payment-type'];
		$card_number = $_POST['card-number'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$card_pin = $_POST['card-pin'];
		$error = array();

		if ($payment_type == "0") 
		{
			$error[] = "Payment type is required";
		}
		if ($month == "0") 
		{
			$error[] = "Month is required";
		}
		if ($year == "0") 
		{
			$error[] = "Year is required";
		}
		if (strlen($card_number) > 16) 
		{
			$error[] = "Invalid card number, it should not exceed 16 digit number";
		}
		if (strlen($card_number) != 16) 
		{
			$error[] = "Invalid card number, it should be 16 digit number not ".strlen($card_number)." digit number";
		}
		//$a = array("eTranzact","MasterCard","Verve","Visa");
		if (!is_numeric($card_number))
		 {
			$error[] = "Invalid card number, it should be only digit number";
		}
		if (!is_numeric($card_pin)) 
		{
			$error[] = "Invalid card pin, it should be only digit number";
		}
		$count_error = count($error);
		if ($count_error == 0) 
		{
			$stmt = $db->prepare("INSERT INTO payments (matric_id,payment_amount,payment_unique_id,payment_status,payment_receipt_number,payment_date)VALUES(:matric_id,:payment_amount,:payment_unique_id,:payment_status,:payment_receipt_number,:payment_date)");
			$stmt->execute(array(
				'matric_id' => user_detail('matric_no'),
				'payment_amount' => 20000,
				'payment_unique_id' => rand(0000000000,9999999999),
				'payment_status' => +1,
				'payment_receipt_number' => rand(0000000000,9999999999),
				'payment_date' => date('d M, Y H:i:s')
				));
			$_SESSION['payment'] = user_detail('id');
			// set_flash("Please enter the One-Time-Password was sent to your mobile registered","info");
			header('location:otp.php');
			exit();
		}else{
			$msg = "$count_error error(s) occur while making payment. Please check error below";
			foreach ($error as  $value) 
			{
				$msg .="<p>".$value."</p>";
			}
			set_flash($msg,"danger");
		}
		$stmt->closeCursor();
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
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="icon" href="image/logo.preview.png">
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
									<img src="image/logo.preview.png" style="width: 100px; height: 35px; ">
								</div>
							</div>
							<div class="panel-body" style="background-color: #eee;">
								<div class="solid-pay"><span><i class="glyphicon glyphicon-user"></i> <?php echo ucwords(user_detail("fname"))," <i class=\"fa fa-phone\"></i> ",user_detail("phone"); ?></span></div>
								<form class="form-group" method="post" role="form">
									<div class="row">
										<div class="col-sm-9 col-xs-12">
											<div class="form-group">
												<label class="control-lebel">Payment Type (*)</label>
												<select class="form-control form-control-resize custom-select " id="payment-type" name="payment-type" required="">
													<option value="0"> -- Select Payment Type -- </option>
														<option>Visa</option>
														<option>Verve</option>
														<option>Paypal</option>
														<option>eTranzact</option>
														<option>MasterCard</option>
														<option>WebMoney</option>
												</select>
												<span id="msg"></span>
											</div>
										</div>
									</div>
									<div class="pay-box">&#8358; 20,000.00</div>
									<div class="row">
										<div class="col-sm-9 col-xs-12">
											<label class="control-lebel">Card Number (*)</label>
											<div class="form-group">
												<div class="input-icon input-credit-card">
													<input type="text" name="card-number" required="" id="card-number"  placeholder="Card Number" class="form-control form-control-resize" maxlength="16">
												</div>
												<span id="msg"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4 col-xs-12">
											<div class="form-group">
												<label class="control-lebel"> Month </label>
												<div class="input-icon input-calendar input-icon-right">
													<select class="form-control form-control-resize custom-select" id="month" name="month" required="">
														<option value="0"> -- Month -- </option>
														<?php 
															$a = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
															foreach ($a as $value)
															 {
																echo '<option>'.$value.'</option>';
															}
														 ?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-4 col-xs-12">
											<div class="form-group">
												<label class="control-lebel"> Year</label>
												<div class="input-icon input-calendar input-icon-right">
													<select class="form-control form-control-resize custom-select" id="year" name="year" required="">
													<option value="0"> -- Year -- </option>
													<?php 
														$a = range(2000, date('Y'));
														foreach ($a as  $value) 
														{
															echo '<option>'.$value.'</option>';
														}
													 ?>
												</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-9 col-xs-12">
											<div class="form-group">
												<label class="control-lebel">Card Pin (*)</label>
												<div class="input-icon input-credit-card">
													<input type="text" name="card-pin" id="card-pin" class="form-control form-control-resize" required="" placeholder="Card Pin">
												</div>
												<span id="msg"></span>
											</div>
											<div class="form-group">
												<input type="submit" name="ok-pay" id="ok-pay" class="btn btn-danger btn-block" value="Pay">
												<div class="loader pull-left hide">
													<img src="image/loading.gif" style="width: 80px; height: 80px;">
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="panel-footer">
								<img src="image/payments-icons.png">  <span class="pull-right text-size text-m-left">&copy; Copyright Interswtich Limited.</span>
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