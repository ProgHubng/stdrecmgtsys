	<?php require_once '../db/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Applicant Profile</title>
	 <?php
      require_once '../libs/css.php';
require_once '../libs/head.php';
     ?>
</head>
<body>
	<?php require_once '../libs/menu.php'; ?>
    <?php require_once '../libs/main-menu.php'; ?>
	<div id="section-body">
		<div class="row" align="CENTER">
			<div class="col-lg-8 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
				<h3 class="page-header" style="color: #000;">Applicant Profile</h3>
				 <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                 <div class="col-xs-12 text-right">
                                    <div class="huge-sm">&#8358; <?php echo number_format(clearance_payment(),2); ?></div>
                                    <div> School Fee Paid</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left" style="font-size: 12px;">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-6 pull-right    ">
                    <img src="../images/<?php echo student_detail("upl"); ?>" class="img-circle" style="width: 150px;
                    height: 150px;">
            </div>
         </div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title">Applicant Profile</h5>
							</div>
							<div class="panel-body">
								
								<table class="table table-striped table-hover">
									<tr>
										<td>Matric Number</td>
										<td><?php echo strtoupper(student_detail("matric_no")); ?></td>
									</tr>
									<tr>
										<td>Full Name</td>
										<td><?php echo ucwords(student_detail("fname")); ?></td>
									</tr>
                                    <tr>
                                        <td>Faculty</td>
                                        <td><?php echo ucwords(student_detail("faculty")); ?></td>
                                    </tr>
									<tr>
										<td>Department</td>
										<td><?php echo ucwords(student_detail("dept")); ?></td>
									</tr>
                                    <tr>
                                        <td>Session</td>
                                        <td><?php echo (student_detail("session")); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Semester</td>
                                        <td><?php echo ucwords(student_detail("semester")); ?></td>
                                    </tr>
									<tr>
										<td>Level</td>
										<td><?php echo ucwords(student_detail("level")); ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
		<?php require_once '../libs/foot.php'; ?>
</body>
</html>