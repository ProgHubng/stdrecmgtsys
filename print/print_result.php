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
	<title></title>
</head>
<body>
	<?php class PDF extends FPDF
			
			{
				function Header()
				{
				$this->image('../images/laut.png',10,10,10,189);
				$this->Ln(38);


				$this->SetFont('Arial','B',11);
				$this->cell(195,9,strtoupper('Semester result'),1,0,'C', false );

				$this->Ln(20);

				// $this->cell(70,9, 'Jamb Reg. No/Form No.',0,0,'L');
				// $this->cell(120,9,student_detail('application_no'),0,0,'L');
				// $this->Ln(10);

				$this->cell(70,9,'Full Name',0,0,'L');
				$this->cell(90,9,strtoupper(student_detail('fname')),0,0,'L');
				$this->Image('../images/'.student_detail('upl'),175,70,20);
				$this->Ln(10);
				
				$this->cell(70,9,'Session',0,0,'L');
				$this->cell(11,9,date('Y').' / ',0,0,'L');
				$this->cell(12,9,date('Y')+1,0,0,'L');
				$this->Ln(10);

				$this->cell(70,9,'Semester',0,0,'L');
				$this->cell(15,9,semester(student_detail('semester')),0,0,'L');
				$this->Ln(10);

				$this->cell(70,9,'Department',0,0,'L');
				$this->cell(50,9,strtoupper(student_detail('dept')),0,0,'L');
				$this->cell(30,9,'Level',0,0,'L');
				$this->cell(30,9,student_detail('level'),0,0,'L');
				$this->Ln(20);

				// $this->cell(195,9,strtoupper('payment details'),0,0,'L');
				// $this->Ln(15);$this->cell(193,2,'',1,0,'L');

				$this->Ln(2);
				$this->cell(30,9,'Course Code',2,0,'C');
				$this->cell(101,9,'Course Title', 2,0,'C');
				$this->cell(23,9,'Unit',2,0,'C');
				$this->cell(40,9,'Adviser/HOD Sign',2,0,'C');
				$this->Ln(9);
				}

				function Footer()
				{
					$this->Ln(12);
					$this->SetFont('Arial','B',11);
					$this->cell(195,10,strtoupper('for official use only'),0,0);
					$this->Ln(9);
					$this->cell(195,10,strtoupper('instruction'),0,0);
					$this->Ln(8);

				}
			}

			$pdf = new PDF ('p','mm','A4');
			$pdf->AddPage();
			$pdf->Image('../images/logo2fade.png',10,50,189);
			$pdf->SetFont('Arial','B',11);
			if (student_detail('semester') == 'First Semester' and student_detail('level') == '100L') 
			{
				$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
				$stmt->execute(array('student_id' => student_detail('id')));
				while ($rs = $stmt->fetch()) 
				{
						$this->cell(30,10,ucfirst(course_code($rs['course_id'])),0,0,'L');
						$this->cell(1);
						$this->cell(100,10,ucwords(course_title($rs['course_id'])),0,0,'L');
						$this->cell(1);
						$this->cell(20,10,course_unit($rs['course_id']),0,0,'L');
						$this->cell(1);
						$this->cell(40,10,'',0,0,'L');
						$this->Ln(9.5);
				}
			}else{
				if (student_detail('semester') == 2 and student_detail('level') == 'ND 1 FT') 
				{
					$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
					$stmt->execute(array('student_id' => student_detail('id')));
					while ($rs = $stmt->fetch()) 
					{
						$this->cell(30,10,ucfirst(course_code($rs['course_id'])),0,0,'L');
						$this->cell(1);
						$this->cell(100,10,ucwords(course_title($rs['course_id'])),0,0,'L');
						$this->cell(1);
						$this->cell(20,10,course_unit($rs['course_id']),0,0,'L');
						$this->cell(1);
						$this->cell(40,10,'',0,0,'L');
						$this->Ln(9.5);
					}
				}else{
					if (student_detail('level') == 'ND 2 FT' and student_detail('semester') == 1) 
					{
						$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
						$stmt->execute(array('student_id' => student_detail('id')));
						while ($rs = $stmt->fetch()) 
						{
								$this->cell(30,10,ucfirst(course_code($rs['course_id'])),1,0,'L');
								$this->cell(1);
								$this->cell(100,10,ucwords(course_title($rs['course_id'])),1,0,'L');
								$this->cell(1);
								$this->cell(20,10,course_unit($rs['course_id']),1,0,'L');
								$this->cell(1);
								$this->cell(40,10,'',1,0,'L');
								$this->Ln(9.5);
						}
					}else{
						if (student_detail('level') == 'ND 2 FT' and student_detail('semester') == 2)
						 {
							$stmt = $db->prepare("SELECT * FROM result WHERE student_id=:student_id");
								$stmt->execute(array('student_id' => student_detail('id')));
								while ($rs = $stmt->fetch()) 
								{
										$this->cell(30,10,ucfirst(course_code($rs['course_id'])),1,0,'L');
										$this->cell(1);
										$this->cell(100,10,ucwords(course_title($rs['course_id'])),1,0,'L');
										$this->cell(1);
										$this->cell(20,10,course_unit($rs['course_id']),1,0,'L');
										$this->cell(1);
										$this->cell(40,10,'',1,0,'L');
										$this->Ln(9.5);
								}
						}
					}
				}
			}
			$stmt->closeCursor();
			$pdf->output();
			var_dump($pdf);
	 ?>
</body>
</html>
