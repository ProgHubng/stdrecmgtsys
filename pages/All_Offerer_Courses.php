<?php 
	$page_title = "Check Offered Courses";
	require_once '../core/all.php';
	if (!is_admin_login()){
		header("location:index.php");
		exit();
	}
	if (isset($_POST['ok'])) {
		$dept = $_POST['dept'];
		$semester = $_POST['semester'];
		$level = $_POST['level'];
		$session = $_POST['session'];

		$error = array();

		$errors = array('departmet' =>$dept,'semester'=>$semester,'level'=>$level,'session'=>$session);

		foreach ($errors as $key => $value) {
			if ($value == 0) {
				$error[] = ucwords($key)." field are required";
			}
		}

        $sql = $db->query("SELECT * FROM course WHERE dept ='$dept' and level ='$level'");
        $num_rows = $sql->rowCount();

        if ($num_rows == 0){
            $error[] = "No course registered for ".department($dept)." Department ".strtoupper(level($level))." in ".semester($semester);
        }

		$error_count = count($error);
		if ($error_count == 0) {

            while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){

                $course_id = $rs['id'];

                $offered_course = $db->query("SELECT * FROM course_offered_lecturer WHERE course_id ='$course_id'  and 
                    session ='$session'");

                while ($rs_offered = $offered_course->fetch(PDO::FETCH_ASSOC)){
                    $course_id_offered[] = $rs_offered['id'];
                }

            }

		}else{
			$msg = "$error_count error(s) occur while checking for offered course";
			foreach ($error as $value) {
				$msg.='<p>'.$value.'</p>';
			}
			set_flash($msg,'danger');
		}
	}
	if (isset($_POST['remove-course'])){
	    @$select = $_POST['select'];
	    if ($select == 0){
	        set_flash("No course selected","danger");
        }else{
	        for ($ii =0; $ii < count($select); $ii++){
	            $course_id_taken = $select[$ii];
	            $num_rows = count($course_id_taken);
	            $del = $db->query("DELETE FROM course_offered_lecturer WHERE id ='$course_id_taken'");
	            set_flash("$num_rows course was removed","warning");
	        }

        }
    }
	require_once 'libs/head.php';
 ?>

 <section class="content-wrapper">
 	<div class="content-header">
 		<h3><?php echo $page_title; ?></h3>
 	</div>
 	<div class="content">
 		<div class="row">
 			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
 				<div class="box">
 					<div class="box-header">
 						<h5 class="box-title"><?php echo $page_title; ?></h5>
 					</div>
 					<div class="box-body">

 						<?php flash(); ?>
 						
 						<form class="form-group" method="post">
 							<div class="form-group">
 								<label>Department</label>
 								<select class="form-control custom-select select2 " name="dept" required="" style="height: 48px;">
 									<option value="0">-- Select --</option>
 									<?php 
 										$sql = $db->query("SELECT * FROM department ORDER BY name");
 										while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
 											echo '<option value="'.$rs['id'].'">'.ucwords($rs['name']).'</option>';
 										}
 									 ?>
 								</select>
 							</div>

 							<div class="form-group">
 								<label>Semester</label>
 								<select class="form-control custom-select select2 " style="height: 48px;" name="semester" required="">
 									<option value="0">-- Select --</option>
 									<option value="1">First Semester</option>
 									<option value="2">Second Semester</option>
 								</select>
 							</div>

 							<div class="form-group">
 								<label>Level</label>
 								<select class="form-control custom-select select2 " name="level" style="height: 48px" required="">
 									<option value="0">-- Select --</option>
 									<?php 
 										$sql = $db->query("SELECT * FROM level ORDER BY name");
 										while ($rs = $sql->fetch(PDO::FETCH_ASSOC)) {
 											echo '<option value="'.$rs['id'].'">'.strtoupper($rs['name']).'</option>';
 										}
 									 ?>
 								</select>
 							</div>

 							<div class="form-group">
 								<label>Academic Session</label>
 								<select class="form-control select2 custom-select" name="session" required="" style="height: 48px;">
 									<option value="0">-- Select -- </option>
 									<?php 
 										foreach (range(2019, date('Y')) as $value) {
 											$y = $value-1;
 											$y.= '/'.$value;
 											echo '<option>'.$y.'</option>';
 										}
 									 ?>
 								</select>
 							</div>

 							<div class="form-group">
 								<input type="submit" name="ok" class="btn btn-warning" value="Submit">
 							</div>
 						</form>
 					</div>
 				</div>
 			</div>

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Offered Courses</h5>
                    </div>
                    <div class="box-body">
                        <form action="" method="post">
                            <table class="table table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th></th>
                                        <th>Staff Full Name</th>
                                        <th>Staff Department</th>
                                        <th>Course Code</th>
                                        <th>Student Department</th>
                                        <th>Level</th>
                                        <th>Session</th>
                                        <th>Schedule</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th></th>
                                        <th>Staff Full Name</th>
                                        <th>Staff Department</th>
                                        <th>Course Code</th>
                                        <th>Student Department</th>
                                        <th>Level</th>
                                        <th>Session</th>
                                        <th>Schedule</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $course_id = @$course_id_offered;
                                        $ii = 1;

                                        for ($j = 0; $j < count($course_id); $j++){
                                            $id = $course_id[$j];

                                            $sql = $db->query("SELECT * FROM course_offered_lecturer WHERE id ='$id'");
                                            while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){

                                                $staff_id = $rs['staff_id'];

                                                ?>

                                                <tr>
                                                    <td><?php echo $ii++;?></td>
                                                    <td><input type="checkbox" name="select[]" value="<?php echo $rs['id'];?>" id=""></td>
                                                    <td><?php echo ucwords(staff_details($rs['staff_id'],'fname')); ?></td>
                                                    <td><?php echo  ucwords(department(staff_details($rs['staff_id'], 'dept')));?></td>
                                                    <td><?php echo strtoupper(course($rs['course_id'],'course_code')) ?></td>
                                                    <td><?php echo ucwords(department($dept));?></td>
                                                    <td><?php echo strtoupper(level($level));?></td>
                                                    <td><?php echo $rs['session'];?></td>
                                                    <td><?php echo $rs['schedule'];?></td>
                                                </tr>
                                                <?php
                                            }

                                        }

                                    ?>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <input type="submit" name="remove-course" id="" class="btn btn-danger" value="Removed Course">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
 		</div>
 	</div>
 </section>

 <?php require_once 'libs/foot.php'; ?>