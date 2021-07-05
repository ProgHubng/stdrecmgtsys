<?php 
	require_once '../db/db.php'; 
	if (!login())
	 {
		header('location:login.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Clearance Payment</title>
	<?php require_once '../libs/cpanel_css.php'; ?>
</head>
<body>
	<?php require_once '../libs/cpanel_menu.php'; ?>

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3 class="page-header text-black">Clearance Payment</h3>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h5 class="panel-title">Print Payment Receipt</h5>
					</div>
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover">
		             	<thead>
		             		<tr>
		                      <th>S/N</th>
		                      <th>Trans (ID)</th>
		                      <th>Interswtich (RR)</th>
		                      <th>Transaction Date</th>
		                      <th>Payment Type</th>
		                      <th>Transaction Amount</th>
		                      <th>Payment Status</th>
		                      <th>Action</th>
		                   </tr>
		             	</thead>
		             	<tbody>
		             		<?php 

		             				$stmt = $db->prepare("SELECT * FROM payments WHERE matric_id=:matric_id ");
		             				$stmt->execute(array('matric_id' => user_detail("matric_no")));
		             				while ($rs = $stmt->fetch())
		             				 {
		             					//var_dump($rs);
		             					if ($rs['payment_status'] != 0) 
		             					{
		             						?>
		             							<tr class="odd gradeX">
		             								<td><?php echo $rs['id']; ?></td>
		             								<td><?php echo $rs['payment_receipt_number']; ?></td>
		             								<td><?php echo $rs['payment_unique_id']; ?></td>
		             								<td><?php echo $rs['payment_date']; ?></td>
		             								<td>Clearance</td>
		             								<td>&#8358;<?php echo number_format($rs['payment_amount'],2); ?></td>
		             								<td><?php echo payment_status($rs['payment_status']); ?></td>
		             								<td><a href="print.php" class="btn btn-warning" type="button" target="_blank" id="print">Print</a></td>
		             							</tr>
		             						<?php
		             					}else{
		             						alert("D","danger");
		             					}
		             				}
		             		 ?>
		             	</tbody>
		             	<tbody>
		             		
		             	</tbody>
		             </table> 
					</div>
				</div>                 
			</div>
		</div>
		</div>
	</div>

<?php require_once '../libs/cpanel_foot.php'; ?>
</body>
</html>