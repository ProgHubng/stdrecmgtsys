<?php 

	function set_flash ($msg,$type)
	{
		$_SESSION['flash'] = '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								  '.$msg.'
								</div>';
	}
	function flash()
	{
		if (isset($_SESSION['flash']))
		 {
			echo $_SESSION['flash'];
			unset($_SESSION['flash']);
		}
	}
	function alert($msg,$type,$close = false)
	{	
		if ($close == false) 
		{
			$msg = "<div class='alert alert-".$type."'>".$msg."</div>";
		}else{
			$msg = "<div class='alert alert-".$type."'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$msg."</div>";
		}
		echo $msg;
	}
	function student_detail($value)
	{
		global $db;
		@$email=$_SESSION['apply'];
		$stmt = $db->prepare("SELECT * FROM application WHERE email=:email");
		$stmt->execute(array('email' => $email));
		$rs = $stmt->fetch();
		return $rs[$value];
		$stmt->closCursor();
	}
	function apply_detail($value)
	{
		global $db;
		@$email=$_SESSION['apply'];
		$stmt = $db->prepare("SELECT * FROM application WHERE email =:email");
		$stmt->execute(array('email' => $email));
		$rs = $stmt->fetch();
		return $rs[$value];
		$stmt->closCursor();
	}
	function student_login()
	{
		if (isset($_SESSION['student'])) 
		{
			return true;
		}else{
			return false;
		}
	}	

	function student_details($value){
		global $db;
		@$matric = $_SESSION['student'];
		$sql = $db->query("SELECT * FROM application WHERE matric_no='$matric'");
		$rs = $sql->fetch(PDO::FETCH_ASSOC);
		return $rs[$value];
	}

	function apply_login()
	{
		if (isset($_SESSION['apply'])) 
		{
			return true;
		}else{
			return false;
		}
	}
	function admin()
	{
		if (isset($_SESSION['admin'])) 
		{
			return true;
		}else{
			return false;
		}
	}
	function admin_detail($value)
	{
		global $db;
		$stmt = $db->prepare("SELECT * FROM admin WHERE username =:username");
		$stmt->execute(array('username' => $_SESSION['admin']));
		$rs = $stmt->fetch();
		return $rs[$value];
		$stmt->closCursor();
	}
	function semester($n)
	{
		if ($n == 1) 
		{
			return 'First Semester';
		}else{
			return 'Second Semester';
		}
	}
	function student_biodata($value)
	{
		global $db;
		$stmt = $db->prepare("SELECT * FROM biodata WHERE student_id =:student_id");
		$stmt->execute(array('student_id' => student_detail('id')));
		$rs = $stmt->fetch();
		return $rs[$value];
		$stmt->closCursor();
	}
	function student_exam($value)
	{
		global $db;
		$stmt = $db->prepare("SELECT * FROM exam WHERE student_id =:student_id");
		$stmt->execute(array('student_id' => student_detail('id')));
		$rs = $stmt->fetch();
		return $rs[$value];
		$stmt->closCursor();
	}
	function course_code($Course_id)
	{
		global $db;
		$stmt = $db->prepare("SELECT Course_id,course_code FROM courses WHERE Course_id =:Course_id");
		$stmt->execute(array('Course_id' => $Course_id));
		$rs = $stmt->fetch();
		return $rs['course_code'];
		$stmt->closCursor();
	}
	function course_title($Course_id)
	{
		global $db;
		$stmt = $db->prepare("SELECT Course_id,course_title FROM courses WHERE Course_id =:Course_id");
		$stmt->execute(array('Course_id' => $Course_id));
		$rs = $stmt->fetch();
		return $rs['course_title'];
		$stmt->closCursor();
	}
	function course_unit($Course_id)
	{
		global $db;
		$stmt = $db->prepare("SELECT Course_id,unit FROM courses WHERE Course_id =:Course_id");
		$stmt->execute(array('Course_id' => $Course_id));
		$rs = $stmt->fetch();
		return $rs['unit'];
		$stmt->closCursor();
	}
	function webpay()
	{
		global $db;
		$stmt = $db->prepare("SELECT NULL FROM payments WHERE matric_id=:matric_id and payment_status=:payment_status");
		$stmt->execute(array('matric_id' => user_detail('id'), 'payment_status' => '1'));
		$rs = $stmt->fetch();
		if ($stmt->rowCount() >= 1) 
		{
			header('location:portal.php');
			exit();
		}elseif ($rs['matric_id'] == user_detail('id'))
		 {
			header('location:otp.php');
			exit();
		}
		$stmt->closeCursor();
	}
	function app_webpay()
	{
		global $db;
		$stmt = $db->prepare("SELECT NULL FROM app_payment WHERE email=:email and payment_status=:payment_status");
		$stmt->execute(array('email' => apply_detail('email'), 'payment_status' => '1'));
		$rs = $stmt->fetch();
		if ($stmt->rowCount() >= 1) 
		{
			header('location:apply1.php');
			exit();
		}elseif ($rs['email'] == apply_detail('email'))
		 {
			header('location:otp.php');
			exit();
		}
		$stmt->closeCursor();
	}
	function clearance_payment()
	{
		global $db;
		$stmt = $db->prepare("SELECT id,payment_amount FROM app_payment WHERE email=:email and payment_amount=:payment_amount");
		$stmt->execute(array('email' => apply_detail('email'), 'payment_amount' => '20000'));
		$rs = $stmt->fetch(PDO::FETCH_ASSOC);
		return $rs['payment_amount'];
		$stmt->closeCursor();
	}
	function payment_status($n)
	{
		if ($n == 0) 
		{
			return "Paid, Not Confirmed";
		}else{
			return "Completed";
		}
	}

	function dept_detail($id)
	{
		global $db;
		$stmt = $db->prepare("SELECT Dept_id,Dept_name FROM dept WHERE Dept_id=:Dept_id");
		$stmt->execute(array('Dept_id' => $Dept_id));
		$rs = $stmt->fetch(PDO::FETCH_ASSOC);
		return $rs['Dept_name'];
		$stmt->closeCursor();
	}
   function student_matric($id)
	{
		global $db;
		$stmt = $db->prepare("SELECT id,matric_no FROM students WHERE Course_id=:Course_id");
		$stmt->execute(array('id' => $id));
		$rs = $stmt->fetch();
		return $rs['matric_no'];
		$stmt->closeCursor();
	}
	function check_payment()
	{
		global $db;
		$stmt = $db->prepare("SELECT id,email FROM app_payment WHERE email=:email");
		$stmt->execute(array('email' => apply_detail('email')));
		$rs = $stmt->fetch();
		return $rs['email'];
		$stmt->closeCursor();
	}
   function grade($scores){
        if ($scores >= 70 || $scores >= 100){
            return "5.00";
        } else if ($scores >= 60 || $scores >= 69 ){
            return "4.00";
        } else if ($scores >= 50 || $scores >= 59){
            return "3.00";
        }else if ($scores >= 45 || $scores >= 49){
            return "2.00";
        } else if ($scores >= 40 || $scores >= 44){
            return "1.00";
        } else {
            return "0.00";
        }
    }

    function gpa_point($point) {
    if ($point >= "4.50" || $point >= "5.00"){
        return "First Class";
    } else if ($point >= "3.50" || $point >= "4.49"){
        return "Second Upper Division";
    } else if ($point >= "2.40" || $point >= "3.49"){
        return  "Second Lower Division";
    } else if ($point >= "1.50" || $point >= "2.39"){
        return  "Third Class Division";
    } else if ($point >= "1.00" || $point >= "1.49"){
        return  "Pass";
    } else{
        return  "Fail";
    }
}
function grades($scores){
        if ($scores >= 70 || $scores >= 100){
            return "A";
        } else if ($scores >= 60 || $scores >= 69 ){
            return "B";
        } else if ($scores >= 50 || $scores >= 59){
            return "C";
        }else if ($scores >= 45 || $scores >= 49){
            return "D";
        } else if ($scores >= 40 || $scores >= 44){
            return "E";
        } else {
            return "F";
        }
    }
 ?>


 
