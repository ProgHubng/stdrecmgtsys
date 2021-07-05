<?php 
	$page_title = "Result Checking";
	require_once '../db/db.php';
	if (!student_login()) 
	{
		header('location:login.php');
		exit();
	}

	if (isset($_POST['ok'])) {
		$semester = $_POST['semester'];
		$session = $_POST['session'];

		$matric_no = student_details('matric_no');
		$level = student_details('level');

		$total_unit = 0;

		$sql_t = $db->query("SELECT * FROM test_result WHERE matric_no='$matric_no' and semester='$semester' and session='$session' and level='$level'");
		$num_row = $sql_t->rowCount();

		$sql_ex = $db->query("SELECT * FROM result WHERE student_id='$matric_no' and semester='$semester' and session='$session' and level='$level'");

		$num_row1 = $sql_ex->rowCount();

		$student_array = array();

		if ($num_row == 0 or $num_row1 == 0) {
			set_flash("No available result","danger");
		}else{

			$student_array[$matric_no] = array();

			
			while ($rs = $sql_t->fetch(PDO::FETCH_ASSOC)) {
				$t_course_title[] = $rs['course_title'];
				$t_course_unit[] = $rs['course_unit'];
				$t_test_score[] = $rs['test_score'];
				$t_course_code[] = $rs['course_code'];
				$total_unit+=$rs['course_unit'];
			}

			while ($rs2 = $sql_ex->fetch(PDO::FETCH_ASSOC)) {
				$ex_course_title[] = $rs2['course_title'];
				$ex_course_unit[] = $rs2['course_unit'];
				$ex_test_score[] = $rs2['exam_score'];
				$ex_course_code[] = $rs2['course_code'];
			}

			$student_array[$matric_no]['t_course_title'] = $t_course_title;
			$student_array[$matric_no]['t_course_unit'] = $t_course_unit;
			$student_array[$matric_no]['t_test_score'] = $t_test_score;
			$student_array[$matric_no]['t_course_code'] = $t_course_code;

			$student_array[$matric_no]['ex_course_unit'] = $ex_course_unit;
			$student_array[$matric_no]['ex_course_title'] = $ex_course_title;
			$student_array[$matric_no]['ex_test_score'] = $ex_test_score;
			$student_array[$matric_no]['ex_course_code'] = $ex_course_code;

			$total_grade = 0;

			 class PDF extends FPDF{

			 	function Header(){
					$this->Image('../images/laut.png',20,20,20);
					$this->Ln(10);

					$this->SetFont('Arial','B',11);
					$this->cell(220,9,strtoupper('ladoke akintola university of technology, ogbomosho'),20,15,'C');
					$this->cell(195,0,strtoupper('SEMESTER RESULT'),0,0,'C');
					$this->Ln(20);

					$this->cell(40,10,'Full Name',0,0,'L');
					$this->cell(80,10,ucwords(student_details('fname')),0,0,'L');
					$this->Image('../images/'.student_details('upl'),170,50,25);
					$this->Ln(10);

					$this->cell(40,10,'Matric Number',0,0,'L');
					$this->cell(80,10,strtoupper(student_details('matric_no')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,'Session',0,0,'L');
					$this->cell(80,10,strtoupper(student_details('session')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,'Semster',0,0,'L');
					$this->cell(80,10,ucwords(student_details('semester')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,'Faculty',0,0,'L');
					$this->cell(80,10,ucwords(student_details('faculty')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,'Department',0,0,'L');
					$this->cell(50,10,ucwords(student_details('dept')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,"Level",0,0,'L');
					$this->cell(50,10,ucwords(student_details('level')),0,0,'L');
					$this->Ln(15);

					$this->cell(195,9,'Semster Results Details',1,0,'L');
					$this->Ln(9);
					$this->cell(10,9,'S/N',1,0,'C');
					$this->cell(20,9,'CODE',1,0,'C');
					$this->cell(87,9,'COURSE TITLE',1,0,'L');
					$this->cell(15,9,'UNIT',1,0,'C');
					$this->cell(18,9,'SCORE',1,0,'C');
					$this->cell(25,9,'C.POINT',1,0,'C');
					$this->cell(20,9,'GRADE',1,0,'C');
					$this->Ln(9);
				}

			 }

			$pdf = new PDF('p','mm','A4');
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',11);

			 $j =1;

			foreach ($student_array as  $value) {
				$t_course_title1 = count($value['t_course_title']);
				$ex_course_title1 = count($value['ex_course_title']);
				for($ii = 0; $ii < $t_course_title1; $ii++){
					if ($value['t_course_title'][$ii] == $value['ex_course_title'][$ii] and $value['t_course_unit'][$ii] == $value['ex_course_unit'][$ii] and $value['t_course_code'][$ii] == $value['ex_course_code'][$ii]) {

						$score = $value['t_test_score'][$ii] + $value['ex_test_score'][$ii];
						$course_title2 = $value['t_course_title'];

						$credit_point = grade($score);
						$total_grade+=$credit_point;

						$scores[] = $score;

						$pdf->cell(10,9,$j++,1,0,'C');
						$pdf->cell(20,9,$value['t_course_code'][$ii],1,0,'L');
						$pdf->cell(87,9,strtoupper($value['ex_course_title'][$ii]),1,0,'L');
						$pdf->cell(15,9,$value['ex_course_unit'][$ii],1,0,'C');
						$pdf->cell(18,9,$score,1,0,'C');
						$pdf->cell(25,9,$credit_point,1,0,'L');
						$pdf->cell(20,9,grades($score),1,0,'L');
						$pdf->Ln(9);

					}	

				}

				$student_array[$matric_no]['scores'] = $scores;

				$total_grade2 = substr($total_grade / $total_unit, 0,4);

				$pdf->Cell(117,9,"TOTAL",1,0,"R");
				$pdf->cell(15,9,$total_unit,1,0,'C');
				$pdf->cell(18,9," ",1,0,'C');
				$pdf->cell(25,9,$total_grade,1,0,'L');
				$pdf->cell(20,9," ",1,0,'L');
				$pdf->Ln();
				$pdf->Cell(117,9," ",1,0,"R");
				$pdf->cell(15,9," ",1,0,'C');
				$pdf->cell(18,9,"GPA ".$total_grade2,1,0,'C');
				$pdf->cell(25,9,"CGPA : 0.00",1,0,'L');
				$pdf->cell(20,9,"",1,0,'L');
			
				// $pdf->Cell(90,12,"Remark:  ",1);


				foreach ($student_array as  $value1) {
					if ($value1['scores'] <=39 ) {
						
					}
				}

			}

			$pdf->output();

		}
	}

	// var_dump(student_details('id'));
	// exit();
	require_once '../libs/head.php';
	require_once '../libs/main-menu.php';
 ?>

 <section class="content-wrapper">
 	<div class="content-header">
 		<h1><?php echo $page_title; ?></h1>
 		<ol class="breadcrumb">
 			<li><a href="tmp.php"><?php echo $page_title; ?></a></li>
 			<li class="active"><?php echo $page_title; ?></li>
 		</ol>
 	</div>
 	<div class="content">
 		<div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
 			
 			<div class="box">
 				<div class="box-header">
 					<?php echo $page_title; ?>
 				</div>
 				<div class="box-body">
 					
 					<?php flash(); ?>
 					<form method="post" role="form">
 						<div class="form-group">
 							<label>Semester</label>
 							<select class="form-control" name="semester" required="">
 								<option value="HARMATTAN">Harmattan</option>
 								<option value="RAIN">Rain</option>
 							</select>
 						</div>

 						<div class="form-group">
 							<label>Academic Session</label>
 							<select class="form-control" name="session" required="">
 								<?php 
 									foreach (range(2018, date('Y')) as $value) {
 										$value2 = $value+1;
 										?>php
 										<option><?php echo $value.'/'.$value2; ?></option>
 										<?php
 									}
	 							 ?>
 							</select>
 						</div>

 						<div class="form-group">
 							<input type="submit" name="ok" class="btn btn-primary" value="Submit">
 						</div>
 					</form>

 				</div>
 			</div>

 			</div>
 		</div>
 	</div>
 </section>

 <?php require_once '../libs/foot.php'; ?>
