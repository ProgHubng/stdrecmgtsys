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
					$this->Ln(15);

					$this->SetFont('Arial','B',11);
					$this->cell(220,9,strtoupper('ladoke akintola university of technology, ogbomosho'),20,15,'C');

					$this->SetFont('Arial','B',10);
					$this->cell(195,9,strtoupper('library Access form'),0,0,'C');
                    $this->SetFillColor(20,2,0);
					$this->Ln(10);


					$this->cell(40,9,'Matric Number',0,0,'L');
					$this->cell(80,9,strtoupper(student_details('matric_no')),0,0,'L');
					$this->Image('../images/'.student_details('upl'),155,60,18);
					$this->Ln(8);

					$this->cell(40,9,'Full Name:',0,0,'L');
					$this->cell(30,9, strtoupper(student_details('fname')),0,0,'L');
					$this->Ln(8);

					$this->cell(40,9,'Session:',0,0,'L');
					$this->cell(11,9,date('Y').' / ',0,0,'L');
					$this->cell(12,9,date('Y')+1,0,0,'L');
					$this->Ln(8);

					$this->cell(40,9,'Semester:',0,0,'L');
					$this->cell(40,9,semester(student_details('semester')),0,0,'L');
					$this->Ln(8);

					$this->cell(30,9,'Department:',0,0,'L');
					$this->cell(120,9,student_details('dept'),0,0,'L');
					$this->cell(18,9,'Level:',0,0,'L');
					$this->cell(40,9,student_details('level'),0,0,'L');
					$this->Ln(8);

					$this->cell(30,9, 'Date of Birth:', 0,0,'L');
					$this->cell(50,9, student_details('dob'),0,0,'L');
					$this->cell(30,9,'Phone No.:',0,0,'L');
					$this->cell(55,9,student_details('phone'),0,0,'L');
					$this->Ln(8);

					$this->cell(17,9,'Sex:',0,0,'L');
					$this->cell(14,9,student_details('sex'),0,0,'L');
					$this->cell(10,9,'State:',0,0,'L');
					$this->cell(40,9,student_details('state').' State',0,0,'L');
					$this->Ln(8);

					$this->cell(60,9,'Local Govt. Area:', 0,0,'L');
					$this->cell(40,9,student_details('lga'),0,0,'L');
					$this->cell(20,9,'E-Mail:',0,0,'L');
					$this->cell(55,9,student_details('email'),0,0,'L');
					$this->Ln(8);

					$this->cell(60,9,'Address:',0,0,'L');
					$this->cell(120,9,strtoupper(student_details('addr')),0,0,'L');
					$this->Ln(12);

					$this->cell(35,9,'Student Signature:', 0,0,'L');
					$this->cell(45,9,'_____________________',0,0,'L');
					$this->cell(40,9,'H.O.D\'s Comments sign:',0,0,'L');
					$this->cell(55,9,'____________________',0,0,'L');
					$this->Ln(11);

					$this->cell(195,9,strtoupper('library access certificate for '.date('Y').' academic session'),1,0,'L');
					$this->Ln(14);

//
					
					$this->cell(195,0,'Circulation Liberian',0,0,'L');
					$this->Ln(5);

					$this->cell(25,9,'Date Received:',0,0,'L');
					$this->cell(30,9,'______________________________________',0,0,'L');
					$this->Ln(7);

					$this->cell(37,9,'Result Of Application:',0,0,'L');
					$this->cell(70,9,'______________________________________',0,0,'L');
					$this->Ln(7);

					$this->cell(11,9,'Name:',0,0,'L');
					$this->cell(70,9,'___________________________________',0,0,'L');
					$this->Ln(7);

					$this->cell(9,9,'Sign:',0,0,'L');
					$this->cell(70,9,'___________________________________',0,0,'L');
					$this->Ln(11);
				}

				function Footer()
				{
					$this->SetFont('Arial','B',10);
					// $this->SetFillColor(180,180,255);
					// $this->SetDrawColor(50,60,150);
					$this->cell(195,9,strtoupper('class attendance clearance '.date('Y').' academic session'),1,0,'L');
					$this->Ln(13);
					$this->cell(190,9,'This is to certify that'.strtoupper(student_details('fname')).'of'.student_details('dept').''.student_details('level').'with Matric Number',0,0,'J');
					$this->Ln(6);
					$this->cell(180,9,strtoupper(student_details('matric_no')). ' has been completed all registration and is hereby certified to attend classes.',0,0,'J');
					$this->Ln(9);
					// $this->cell(195,9,'or be liable to prosecution or both. I also declare that I shall abide by the rules of the institution.',0,0,'L');
					// $this->Ln(8);
					$this->cell(40,5,'SCHOOL OFFICIER',1,0,'L');
					$this->Ln(9);
					$this->cell(11,9,'Name:',0,0,'L');

					$this->cell(70,9,'___________________________________',0,0,'L');
					$this->Ln(7);

					$this->cell(29,9,'Sign and Stamp:', 0, 0,'L');
					$this->cell(70,9,'___________________________________',0,0,'L');
					$this->Ln(7);

//                    'Sign and Stamp: '.date('d M, Y').'',0,0,'C'
				}
			}

			$pdf = new PDF('P','mm','A4');
			$pdf->AddPage();
			
			//$pdf->Image('../images/laut.png', 0, 0, 'w','h');
			$pdf->SetFont('Arial','B',11);
			$pdf->output();
	 ?>

</body>
</html>
