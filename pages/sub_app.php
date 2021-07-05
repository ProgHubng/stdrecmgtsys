	<?php require_once '../db/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Submit Application</title>
	<?php require_once '../libs/cpanel_css.php'; ?>
</head>
<body>
	<?php require_once '../libs/cpanel_menu.php'; ?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h3 class="page-header" style="color: #000;">Submit Application</h3>
				<div class="row">
					 <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                              <div class="col-xs-12 text-right">
                                    <div class="huge">&#8358; 0.00 </div>
                                    <div>Acceptance Fee </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                 <div class="col-xs-12 text-right">
                                    <div class="huge-sm">&#8358; <?php echo number_format(clearance_payment(),2); ?></div>
                                    <div>Clearance Payment Paid</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_payment.php">
                            <div class="panel-footer">
                                <span class="pull-left" style="font-size: 12px;">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                 <div class="col-xs-12 text-right">
                                    <div class="huge">&#8358; 0.00</div>
                                    <div>School Fee</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="image/<?php echo user_detail("upl"); ?>" class="img-circle" style="width: 150px;
                    height: 150px;">
            </div>
         </div>
					<div class="col-md-12  col-sm-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title">Submit Applications</h5>
							</div>
							<div class="panel-body">
								<h4 class="page-header" style="color: #000;">Submit Applications</h4>
								<table class="table table-striped table-hover">
									<tr>
										<td>Matric Number</td>
										<td><?php echo strtoupper(user_detail("matric_no")); ?></td>
									</tr>
									<tr>
										<td>Full Name</td>
										<td><?php echo ucwords(user_detail("fname")); ?></td>
									</tr>
									<tr>
										<td>Department</td>
										<td><?php echo department(user_detail("dept")); ?></td>
									</tr>
									<tr>
										<td>Semester</td>
										<td><?php echo ucwords(user_detail("semester")); ?></td>
									</tr>
								</table>

								<h4 class="page-header" style="color: #000;">Application Steps</h4>
								<ol type="circle">
									<li>Make sure you have returned all school properties with you to enable speedy processing; </li>
									<li>NOTE: This can only be done once</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
		<?php require_once '../libs/cpanel_foot.php'; ?>
</body>
</html>