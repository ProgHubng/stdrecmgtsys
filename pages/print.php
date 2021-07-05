<?php 
require_once'../db/db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		class PDF extends FPDF
		{
			function Header()
			{
					$this->Image('../images/laut.png',20,20,20);
					$this->Ln(10);

					$this->SetFont('Arial','B',11);
					$this->cell(220,9,strtoupper('ladoke akintola university of technology, ogbomosho'),20,15,'C');
					$this->cell(195,0,strtoupper(' Semester course form'),0,0,'C');
					$this->Ln(20);

					$this->cell(40,10,'Full Name',0,0,'L');
					$this->cell(80,10,ucwords(student_details('fname')),0,0,'L');
					$this->Image('../images/'.student_details('upl'),170,50,25);
					$this->Ln(10);

					$this->cell(40,10,'Matric Number',0,0,'L');
					$this->cell(50,10,strtoupper(student_details('matric_no')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,'Faculty',0,0,'L');
					$this->cell(80,10,ucwords(student_details('faculty')),0,0,'L');
					$this->Ln(10);
					
					$this->cell(40,10,'Department',0,0,'L');
					$this->cell(50,10,ucwords(student_details('dept')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,'Session',0,0,'L');
					$this->cell(50,10,ucwords(student_details('session')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,'Semester',0,0,'L');
					$this->cell(50,10,ucwords(student_details('semester')),0,0,'L');
					$this->Ln(10);

					$this->cell(40,10,"Level",0,0,'L');
					$this->cell(50,10,ucwords(student_details('level')),0,0,'L');
					$this->Ln(15);
				$this->cell(195,9,'Course Form Details',1,0,'L');
				$this->Ln(9);
				$this->cell(15,9,'S/N',1,0,'C');
				$this->cell(30,9,'Course Code',1,0,'C');
				$this->cell(120,9,'Course Title',1,0,'C');
				$this->cell(30,9,'Course Unit',1,0,'C');
				$this->Ln(9);
			}
			function Footer()
				{
					$this->Ln(15);
					$this->cell(46,7,'Student Signature/Date:',0,'J');
					$this->cell(60,7,'____________________',3,0,'L');
					// $this->Ln(10);

					$this->cell(40,7,'HOD Signature/Date:',0,0,'J');
					$this->cell(20,7,'____________________',0,0,'L');
					$this->Ln(7);
				}
		}
		$total_unit = 0;
							$sql = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
				$sql->execute(array('student_id' => student_details('matric_no')));
				while ($rs = $sql->fetch()) 
				{
				$total_unit+=course_unit($rs['course_id']);
			}
		$pdf = new PDF('p','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',11);
			 $j =1;
			
		if (student_details('semester') == 'HARMATTAN' and student_details('level') == '100L') 
			{
				$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
				$stmt->execute(array('student_id' => student_details('matric_no')));
				while ($rs = $stmt->fetch()) 
				{
						$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
				}
			}elseif (student_details('semester') == 'RAIN' and student_details('level') == '100L') 
				{
					$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
					$stmt->execute(array('student_id' => student_details('matric_no')));
					while ($rs = $stmt->fetch()) 
					{
						$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
					}
				}elseif (student_details('level') == '200L' and student_details('semester') == 'HARMATTAN') 
					{
						$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
						$stmt->execute(array('student_id' => student_details('matric_no')));
						while ($rs = $stmt->fetch()) 
						{
						$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
						}
				}elseif(student_details('level') == '200L' and student_details('semester') == 'RAIN')
						 {
							$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
								$stmt->execute(array('student_id' => student_details('matric_no')));
								while ($rs = $stmt->fetch()) 
								{
						$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
								}
				}elseif(student_details('level') == '300L(Sci. Opt)' and student_details('semester') == 'HARMATTAN') 
					{
						$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
						$stmt->execute(array('student_id' => student_details('matric_no')));
						while ($rs = $stmt->fetch()) 
						{
								$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
						}	
					}elseif (student_details('level') == '300L(Sci. Opt)' and student_details('semester') == 'RAIN')
						 {
							$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
								$stmt->execute(array('student_id' => student_details('matric_no')));
								while ($rs = $stmt->fetch()) 
								{
							$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
								}
						
				}elseif(student_details('level') == '300L(Eng. Opt)' and student_details('semester') == 'HARMATTAN') 
					{
						$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
						$stmt->execute(array('student_id' => student_details('matric_no')));
						while ($rs = $stmt->fetch()) 
						{
							$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
						}
					}elseif (student_details('level') == '300L(Eng. Opt)' and student_details('semester') == 'RAIN')
						 {
							$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
								$stmt->execute(array('student_id' => student_details('matric_no')));
								while ($rs = $stmt->fetch()) 
								{
								$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
								}
						
				}elseif (student_details('level') == '400L' and student_details('semester') == 'HARMATTAN') 
					{
						$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
						$stmt->execute(array('student_id' => student_details('matric_no')));
						while ($rs = $stmt->fetch()) 
						{
								$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						
						$pdf->Ln(9);
						}
					}elseif (student_details('level') == '400L' and student_details('semester') == 'RAIN')
						 {
							$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
								$stmt->execute(array('student_id' => student_details('matric_no')));
								while ($rs = $stmt->fetch()) 
								{
										$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						$pdf->Ln(9);
								}
				}elseif (student_details('level') == '500L(Sci. Opt)' and student_details('semester') == 'HARMATTAN') 
					{
					$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
					$stmt->execute(array('student_id' => student_details('matric_no')));
						while ($rs = $stmt->fetch()) 
						{
							$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						$pdf->Ln(9);
						}
					}else{
					if (student_details('level')=='500L(Sci. Opt)' and student_details('semester')=='RAIN')
						 {
							$stmt = $db->prepare("SELECT * FROM course_form WHERE student_id=:student_id");
								$stmt->execute(array('student_id' => student_details('matric_no')));
								while ($rs = $stmt->fetch()) 
								{
									$pdf->cell(15,9,$j++,1,0,'C');
						$pdf->cell(30,9,course_code($rs['course_id']),1,0,'L');
						$pdf->cell(120,9,ucwords(course_title($rs['course_id'])),1,0,'L');
						$pdf->cell(30,9,course_unit($rs['course_id']),1,0,'L');
						$pdf->Ln(9);
								}
						}	
					}
				$pdf->Cell(165,9,"TOTAL UNIT",1,0,"R");
				$pdf->cell(30,9,$total_unit,1,0,'L');
				$pdf->Ln();
		$pdf->output();
	 ?>
</body>
</html>