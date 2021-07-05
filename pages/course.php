<?php 
	$page_title = "Course Form";
	require_once '../db/db.php';
	if (!student_login()) 
    {
        header('location:login.php');
        exit();
    }
    if (isset($_POST['ok-add'])) 
    {
        $course = $_POST['course'];
        $error = array();
        $course == array();
        $total = count($course);
        if ($total == 0) 
        {
            $error[] = "Course is required";
        }else{
            if ($total > 25) 
            {
                $error[] = "The maximum course registration is 25";
            }
        }
        $error_count = count($error);
        if ($error_count == 0) 
        {
            foreach ($course as $value) 
            {
                $value++;
               $stmt = $db->prepare("INSERT INTO course_form (student_id,course_id,add_date)VALUES(:student_id,:course_id,:add_date)");
               $stmt->execute(array(
                'student_id' => student_details('matric_no'),
                'course_id' => $value,
                'add_date' => date('M d, Y')
                ));
               set_flash("You are successfully registered for this semester courses ","info");
               header('location:course.php');
               // exit();
               // var_dump($value);
               // exit();
            }
        }else{
            $msg = "$error_count error(s) occur while register your course form. Please check the error below";
            foreach ($error as  $value) 
            {
                $msg.="<p>".$value."</p>";
            }
            set_flash($msg,"danger");
        }
        // $stmt->closeCursor();
    }
	require_once '../libs/head.php';
	require_once '../libs/main-menu.php';
 ?>

 <section class="content-wrapper">
 	<div class="content-header">
 		<h1><?php echo $page_title; ?></h1>
 		<ol class="breadcrumb">
 			<li><a href="tmp.php">Student ePanel</a></li>
 			<li class="active"><?php echo $page_title; ?></li>
 		</ol>
 	</div>
 	<div class="content">
 		<div class="row">
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="box box-danger">
                    <div class="box-header">
                        <h5 class="box-title"><?php echo $page_title; ?></h5>
                    </div>
                    <div class="box-body">
                        <?php flash(); ?>
                        <form class="form-group" method="post" role="form">
                            <table class="table table-bordered table-striped table-hover" style="font-weight: bold; cursor: pointer;">
                                <tr>
                                     <td>SN</td>
                                     <td>Course Title</td>
                                     <td>Course Code</td>
                                     <td>Unit</td>
                                </tr>
                            <?php
                            if(student_details('semester') == 'HARMATTAN' and student_details('level') == '100L')
                            {
                                $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title ");
                                $stmt->execute(array('semester' => 'HARMATTAN', 'level' => '100L'));
                                while($rs = $stmt->fetch())
                                {
                                 //var_dump($rs);
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                            <td><?php echo ucwords($rs['course_title']); ?></td>
                                            <td><?php echo ucfirst($rs['course_code']); ?></td>
                                            <td><?php echo $rs['unit']; ?></td>
                                        </tr>   
                                    <?php
                                }
                            }elseif
                                 (student_details('semester') == 'RAIN' and student_details('level') == '100L') 
                                {
                                    $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'RAIN', 'level' => '100L'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }elseif (student_details('semester') == 'HARMATTAN' and student_details('level') == '200L') 
                                    {
                                    $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'HARMATTAN', 'level' => '200L'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }elseif (student_details('semester') == 'RAIN' and student_details('level') == '200L') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'RAIN', 'level' => '200L'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    
                                }elseif (student_details('semester') == 'HARMATTAN' and student_details('level') == '300L(Sci. Opt.)') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'HARMATTAN', 'level' => '300L(Sci. Opt.)'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    
                            }elseif (student_details('semester') == 'RAIN' and student_details('level') == '300L(Sci. Opt.)') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'RAIN', 'level' => '300L(Sci. Opt.)'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    }elseif (student_details('semester') == 'HARMATTAN' and student_details('level') == '300L(Eng. Opt.)') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'HARMATTAN', 'level' => '300L(Eng. Opt.)'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    
                            }elseif (student_details('semester') == 'RAIN' and student_details('level') == '300L(Eng. Opt.)') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'RAIN', 'level' => '300L(Eng. Opt.)'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    }elseif (student_details('semester') == 'HARMATTAN' and student_details('level') == '400L') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'HARMATTAN', 'level' => '400L'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    
                            }elseif (student_details('semester') == 'RAIN' and student_details('level') == '400L') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'RAIN', 'level' => '400L'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    }elseif (student_details('semester') == 'HARMATTAN' and student_details('level') == '500L(Sci. Opt.)') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'HARMATTAN', 'level' => '500L(Sci. Opt.)'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    
                            }elseif(student_details('semester') == 'RAIN' and student_details('level') == '500L(Sci. Opt.)') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'RAIN', 'level' => '500L(Sci. Opt.)'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    }elseif (student_details('semester') == 'HARMATTAN' and student_details('level') == '500L(Sci. Opt.)') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'HARMATTAN', 'level' => '500L(Sci. Opt.)'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                    
                            }else{
                                if(student_details('semester') == 'RAIN' and student_details('level') == '500L(Eng. Opt.)') {
                                        $stmt = $db->prepare("SELECT * FROM courses WHERE semester=:semester and level=:level ORDER BY course_title");
                                    $stmt->execute(array('semester' => 'RAIN', 'level' => '500L(Eng. Opt.)'));
                                    while ($rs = $stmt->fetch()) 
                                    {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="course[]" value="<?php echo $rs['Course_id']; ?>"></td>
                                                <td><?php echo ucwords($rs['course_title']); ?></td>
                                                <td><?php echo ucfirst($rs['course_code']); ?></td>
                                                <td><?php echo $rs['unit']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                  }
                        }
                         // $stmt->closeCursor();
                    ?>
                             </table> 

                             <input type="submit" name="ok-add" class="btn btn-info" value="Add course">  
                        </form>

                    </div>
                </div>
 			</div>
 		</div>
 	</div>	
 </section>

 <?php require_once '../libs/foot.php'; ?>
