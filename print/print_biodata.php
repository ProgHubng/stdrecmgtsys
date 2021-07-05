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

	<?php 
			class PDF extends FPDF
			{
				function Header()
				{
					$this->Image('../images/laut.png',20,20,20);
					$this->Ln(9);

					$this->SetFont('Arial','B',11);
					$this->cell(220,9,strtoupper('ladoke akintola university of technology, ogbomosho'),20,15,'C');
					$this->cell(195,0,strtoupper(' Semester course form'),0,0,'C');
					$this->Ln(16);

					$this->cell(40,10,'Full Name',0,0,'L');
					$this->cell(80,10,ucwords(student_details('fname')),0,0,'L');
					$this->Image('../images/'.student_details('upl'),170,50,25);
					$this->Ln(10);

					$this->cell(40,9,'Matric Number:',0,0,'L');
					$this->cell(50,9,ucwords(student_details('matric_no')),0,0,'L');
					$this->Ln(7);

					$this->cell(40,9,'Faculty:',0,0,'L');
					$this->cell(80,9,ucwords(student_details('faculty')),0,0,'L');
					$this->Ln(7);
					
					$this->cell(40,9,'Department:',0,0,'L');
					$this->cell(50,9,ucwords(student_details('dept')),0,0,'L');
					$this->Ln(7);

					$this->cell(40,9,'Session:',0,0,'L');
					$this->cell(50,9,ucwords(student_details('session')),0,0,'L');
					$this->Ln(7);

					$this->cell(40,9,'Semester:',0,0,'L');
					$this->cell(50,9,ucwords(student_details('semester')),0,0,'L');
					$this->Ln(7);

					$this->cell(40,10,"Level:",0,0,'L');
					$this->cell(50,10,ucwords(student_details('level')),0,0,'L');
					$this->Ln(7);

					$this->cell(40,9, 'Date of Birth:', 0,0,'L');
					$this->cell(50,9, student_details('dob'),0,0,'L');
					$this->cell(22,9,'Phone No.:',0,0,'L');
					$this->cell(20,9,student_details('phone'),0,0,'L');
					$this->Ln(7);

					$this->cell(40,9,'Sex:',0,0,'L');
					$this->cell(50,9,ucwords(student_details('sex')),0,0,'L');
					$this->cell(21,9,'State:',0,0,'L');
					$this->cell(40,9,ucwords(student_details('state')),0,0,'L');
					$this->Ln(7);

					$this->cell(40,9,'Local Govt. Area:', 0,0,'L');
					$this->cell(50,9,ucwords(student_details('lga')),0,0,'L');
					$this->cell(21,9,'E-Mail:',0,0,'L');
					$this->cell(20,9,student_details('email'),0,0,'L');
					$this->Ln(7);

					$this->cell(40,9,'Address:',0,0,'L');
					$this->cell(50,9,ucwords(student_details('addr')),0,0,'L');
					$this->Ln(9);

					$this->cell(195,7,'O\'Level Result',1,0,'C');
					$this->Ln(7);

					$this->cell(30,9,'Exam Type:',0,0,'L');
					$this->cell(30,9,student_details('exam_type'),100,'L');
					$this->Ln(7);

					$this->cell(30,9,'Exam Number',0,0,'L');
					$this->cell(30,7,ucwords(student_details('exam_number')),0,0,'L');
					$this->Ln(7);

					$this->cell(30,9,'Exam Date',0,0,'L');
					$this->cell(30,9,student_details('exam_date'),0,0,'L');
					$this->Ln(7);

					$this->cell(205,6,'_________________________________________________________________________________________',0,1,'L');
					$this->Ln(7);

					$this->cell(60,7,student_details('subject1'),0,0,'L');
					$this->cell(30,7,student_details('grade_score1'),0,0,'L');
					$this->cell(60,7,student_details('subject2'),0,0,'L');
					$this->cell(30,7,student_details('grade_score2'),0,0,'L');
					$this->Ln(7);
					$this->cell(60,7,student_details('subject3'),0,0,'L');
					$this->cell(30,7,student_details('grade_score3'),0,0,'L');
					$this->cell(60,7,student_details('subject4'),0,0,'L');
					$this->cell(30,7,student_details('grade_score4'),0,0,'L');
					$this->Ln(7);
					$this->cell(60,7,student_details('subject5'),0,0,'L');
					$this->cell(30,7,student_details('grade_score5'),0,0,'L');
					$this->cell(60,7,student_details('subject6'),0,0,'L');
					$this->cell(30,7,student_details('grade_score6'),0,0,'L');
					$this->Ln(7);
					$this->cell(60,7,student_details('subject7'),0,0,'L');
					$this->cell(30,7,student_details('grade_score7'),0,0,'L');
					$this->cell(60,7,student_details('subject8'),0,0,'L');
					$this->cell(30,7,student_details('grade_score8'),0,0,'L');
					$this->Ln(7);
					$this->cell(60,7,student_details('subject9'),0,0,'L');
					$this->cell(30,7,student_details('grade_score9'),0,0,'L');
					$this->Ln(7);
				}

				function Footer()
				{
					$this->SetFont('Arial','B','center', 10);
					$this->cell(195,7,strtoupper('declaration'),1,0,'C');
					$this->Ln(8);
					$this->MultiCell(195,7,'I declare that this information stated above is to the best of my knowledge and belief accurate in every details and if at any time is discovered that the information. I have given is false o Incorrect. I will be required to widthdraw or be liable to prosecution or both. I also declare that I shall abide by the rules of the institution.',0,'J');
					$this->Ln(2);

					$this->cell(30,7,'Signature/Date:',0,'J');
					$this->cell(22,7,'______________________________',0,0,'L');
					$this->Ln(10);

					$this->cell(195,7,'School Officer',1,0,'C');
					$this->Ln(18);
					$this->cell(18,7,'Name:',0,0,'J');

					$this->cell(45,6,'___________________________________',0,0,'L');
					$this->Ln(10);

					$this->cell(18,5,'Sign:',0,0,'J');
					$this->cell(20,5,'___________________________________',0,0,'L');
					$this->Ln(8);
				}
			}
			$pdf = new PDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',11);
			$pdf->output();
	 ?>
</body>
</html>
