<?php 
	if (!isset($_SESSION['student']))
	 {
		?>
			<section >
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<span><a href="apply.php" class="btn btn-outline-white"><!-- <i class="fa fa-angle-right"></i> --> Register</a></span>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="pull-right">
								
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	}
 ?>
<section  >
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
    <!-- Default to the left -->
    <p class="footpara"> <span> Ladoke Akintola University  of Techology | Copyright &copy; <?php echo date("Y"); ?></span> All Rights Reserved.</p>
    </div>
		</div>
		<!-- <a href="#" class="btn btn-info scroll-top"><i class="fa fa-angle-up"></i></a> -->
	</div>
</section>
<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/preview.js"></script>
<script type="text/javascript" src="../js/uploadpreview.js"></script>
<script type="text/javascript">
	$.uploadPreview({
      input_field: "#image-upload",
      preview_box: "#image-preview",
      label_field: "#image-label"
    });
</script>
