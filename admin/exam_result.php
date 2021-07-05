<?php 
	$page_title = "Uploading Student Exam Result";
	require_once '../db/db.php';
    require_once 'php-excel-reader/excel_reader2.php';
    require_once 'SpreadsheetReader.php';
	
    if (!admin()) {
		header("location:index.php");
		exit();
	}
    
    if (isset($_POST['import'])) {
            $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

          if(in_array($_FILES["upl"]["type"],$mimes)){

            $uploadFilePath = 'uploads/'.basename($_FILES['upl']['name']);

            move_uploaded_file($_FILES['upl']['tmp_name'], $uploadFilePath);


            $Reader = new SpreadsheetReader_XLSX($uploadFilePath);


            $totalSheet = count($Reader->sheets());

            $start = 0;
            $total = 0;

            foreach ($Reader as $value) {

                    if (isset($value[0])) {
                        $student_id = $value[0];
                    }
                     if (isset($value[1])) {
                        $session = $value[1];
                    }

                    if (isset($value[2])) {
                        $faculty = $value[2];
                    }

                    if (isset($value[3])) {
                        $dept = $value[3];
                    }

                   
                     if (isset($value[4])) {
                        $semester = $value[4];
                    }
                     if (isset($value[5])) {
                        $level = $value[5];
                    }

                    if (isset($value[6])) {
                        $course_title = $value[6];
                    }

                    if (isset($value[7])) {
                        $course_code = $value[7];
                    }

                    if (isset($value[8])) {
                        $course_unit = $value[8];
                    }

                    if (isset($value[9])) {
                        $exam_score = $value[9];
                    }
                      
                    $in = $db->query("INSERT INTO result(student_id,session,faculty,dept,semester,level,course_title,course_code,course_unit,exam_score)VALUES('$student_id','$session','$faculty','$dept','$semester','$level','$course_title','$course_code','$course_unit','$exam_score')");

                     set_flash("Student result imported successfully!","info");
                }



          }

    }
	require_once 'libs/head.php';
    require_once 'libs/menu.php';
 ?>

<section class="content-wrapper">
    <div class="content-header">
        <h1><?php echo $page_title; ?></h1>
        <ol class="breadcrumb">
            <li><a href="tmp.php">Student cPanel</a></li>
            <li class="active"><?php echo $page_title; ?></li>
        </ol>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h5 class="box-title"><?php echo $page_title; ?></h5>
                    </div>
                    <div class="box-body">


                    <?php flash(); ?>

                  <form method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label>Uploading Result</label>
                            <input type="file" name="upl" accept=".xls,.xlsx" required="">
                            <small>File format is : excel file only</small>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="import" class="btn btn-primary" value="Submit">
                        </div>
                  </form>
                 

                  </div>
              </div>
        </div>
    </div>
</div>
</section>
<!-- /#page-wrapper -->
 <?php require_once 'libs/foot.php'; ?>