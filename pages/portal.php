<?php 
	require_once '../db/db.php';
	if (!student_login())
	 {
		header('location:login.php');
		exit();
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student cPanel</title>
	<!--  -->
</head>
<body>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="page-header" style="color: #000;">Student cPanel</h3>
                    <?php flash(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                	<?php 
                        $stmt = $db->prepare("SELECT id,matric_id,payment_status FROM payments WHERE matric_id=:matric_id and payment_status=:payment_status");
                        $stmt->execute(array('matric_id' => user_detail('id') ,'payment_status' => 1));
                        $rs = $stmt->fetch();
                        if ($rs['matric_id'] != user_detail('id') and $rs['payment_status'] != 1) 
                        {
                            alert('A dear '.ucwords(user_detail('fname')).', thanks for applying for clearance click <a href="webpay.php" target="_blank">here</a> to proceed on clearance payment','danger');
                        }else{
                            alert('Your clearance payment has been successfully click <a href="print.php" target="_blank">Here</a> to print your payment receipt ','info');
                        }
                        $stmt->closeCursor();
                     ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php require_once 'libs/cpanel_foot.php'; ?>
</body>
</html>