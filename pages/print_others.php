<?php require_once '../db/db.php'; ?>
 
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
				$this->Image('../images/logo.png',10,10,189);
				$this->Ln(38);

				$this->SetFont('Arial','B',11);
				$this->cell(195,10,strtoupper('clearance payment receipt'),1,0,'C');
				$this->Ln(20);

				$this->cell(60,10,'Full Name',0,0,'L');
				$this->cell(100,10,strtoupper(student_detail('fname')),0,0,'L');
				$this->Image('../images/'.student_detail('upl'),200,75,30);
				$this->Ln(10);

				$this->cell(60,10,'Matric Number',0,0,'L');
				$this->cell(120,10,strtoupper(student_detail('matric_no')),0,0,'L');
				$this->Ln(10);

				$this->cell(60,10,'Department',0,0,'L');
				$this->cell(120,10,department(student_detail('dept')),0,0,'L');
				$this->Ln(10);

				$this->cell(60,10,"Level",0,0,'L');
				$this->cell(120,10,student_detail('level'),0,0,'L');
				$this->Ln(15);

				$this->cell(195,9,strtoupper('payment details'),1,0,'L');
				$this->Ln(15);

				$this->cell(195,9,'Payment Details',1,0,'L');
				$this->Ln(9);
				$this->cell(40,9,'Receipt Number',1,0,'C');
				$this->cell(40,9,'Remita (RR)',1,0,'C');
				$this->cell(40,9,'Date Paid',1,0,'C');
				$this->cell(40,9,'Payment Type',1,0,'C');
				$this->cell(35,9,'Amount Paid',1,0,'C');
				$this->Ln(9);
			}
		}

		$pdf = new PDF('p','mm','A4');
		$pdf->AddPage();
		// $pdf->Image('../images/logo2fade.png',10,50,189);
		$pdf->SetFont('Arial','B',11);
		$stmt = $db->prepare("SELECT * FROM payments WHERE matric_id=:matric_id");
		$stmt->execute(array('matric_id' => student_detail('id')));
		while ($rs = $stmt->fetch()) 
		{
			$pdf->cell(40,9,$rs['payment_receipt_number'],1,0,'C');
			$pdf->cell(40,9,$rs['payment_unique_id'],1,0,'C');
			$pdf->cell(40,9,$rs['payment_date'],1,0,'C');
			$pdf->cell(40,9,'Clearance Payment',1,0,'C');
			$pdf->cell(35,9,'# '.number_format($rs['payment_amount'],2),1,0,'C');
			$pdf->Ln(9);
			$pdf->cell(160,9,'Total',1,0,'R');
			$pdf->cell(35,9,'# '. number_format($rs['payment_amount'],2),1,0,'C');
		}
		$stmt->closeCursor();
		$pdf->output();
	 ?>

</body>
</html>