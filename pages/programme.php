<?php require_once '../db/db.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Programme &dash; Lautech</title>
	<?php require_once '../libs/css.php'; ?>	
</head>
<body>
	<?php require_once '../libs/menu.php'; ?>

	<section id="section-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page-main">
						<article class="article-detail">
							<h3 class="text-danger">PROGRAMMES</h3>
							<div class="toggle-content-area">
                          <div class="toggle-content-main">
                             <div class="toggle-title">
                                <h4>BACHELOR OF TECHNOLOGY DEGREE (B.TECH) AND BACHELOR OF SCIENCE DEGREE (B.Sc), FULL-TIME PROGRAMMES</h4>
                               </div>
                               	<div class="toggle-content">
                                    <span>The following programmes are available on Full-Time basis only for two academic sessions.</span>
                                  <ul class="unstyled-list list-style">
                                    <?php
                    $sql = $db->prepare("SELECT Faculty_id,Faculty_name FROM faculty Where Faculty_id = '1'");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Faculty_id'].','.$rs['Faculty_name'].'">'.$rs['Faculty_name'].'</li>';                     
                        } 
                        ?>

                                    	<ol>
                                    		<?php
                    $sql = $db->prepare("SELECT Dept_id,Dept_Name FROM dept Where Faculty_id = '1'  ");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Dept_id'].','.$rs['Dept_Name'].'">'.$rs['Dept_Name'].'</li>';                     
                        } 
                        ?>    	</ol>

                                      <?php
                    $sql = $db->prepare("SELECT Faculty_id,Faculty_name FROM faculty Where Faculty_id = '2'");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Faculty_id'].','.$rs['Faculty_name'].'">'.$rs['Faculty_name'].'</li>';                     
                        } 
                        ?>
                                      <ol>
                                        <?php
                    $sql = $db->prepare("SELECT Dept_id,Dept_Name FROM dept Where Faculty_id = '2'  ");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Dept_id'].','.$rs['Dept_Name'].'">'.$rs['Dept_Name'].'</li>';                     
                        } 
                        ?>
                                        
                                      </ol>
                                     <?php
                    $sql = $db->prepare("SELECT Faculty_id,Faculty_name FROM faculty Where Faculty_id = '3'");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Faculty_id'].','.$rs['Faculty_name'].'">'.$rs['Faculty_name'].'</li>';                     
                        } 
                        ?>
                                      <ol>
                                        <?php
                    $sql = $db->prepare("SELECT Dept_id,Dept_Name FROM dept Where Faculty_id = '3'  ");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Dept_id'].','.$rs['Dept_Name'].'">'.$rs['Dept_Name'].'</li>';                     
                        } 
                        ?>
                                        
                                      </ol>

                                      <?php
                    $sql = $db->prepare("SELECT Faculty_id,Faculty_name FROM faculty Where Faculty_id = '4'");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Faculty_id'].','.$rs['Faculty_name'].'">'.$rs['Faculty_name'].'</li>';                     
                        } 
                        ?>
                                      <ol>
                                        <?php
                    $sql = $db->prepare("SELECT Dept_id,Dept_Name FROM dept Where Faculty_id = '4'  ");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Dept_id'].','.$rs['Dept_Name'].'">'.$rs['Dept_Name'].'</li>';                     
                        } 
                        ?>
                      </ol>
                      
                                        
                                     <?php
                    $sql = $db->prepare("SELECT Faculty_id,Faculty_name FROM faculty Where Faculty_id = '5'");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Faculty_id'].','.$rs['Faculty_name'].'">'.$rs['Faculty_name'].'</li>';                     
                        } 
                        ?>
                      
                                      <ol>
                                        <?php
                    $sql = $db->prepare("SELECT Dept_id,Dept_Name FROM dept Where Faculty_id = '5'  ");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Dept_id'].','.$rs['Dept_Name'].'">'.$rs['Dept_Name'].'</li>';                     
                        } 
                        ?>
                                        
                                      </ol> 
                                           <?php
                    $sql = $db->prepare("SELECT Faculty_id,Faculty_name FROM faculty Where Faculty_id = '6'");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Faculty_id'].','.$rs['Faculty_name'].'">'.$rs['Faculty_name'].'</li>';                     
                        } 
                        ?>
                                      <ol>
                                        <?php
                    $sql = $db->prepare("SELECT Dept_id,Dept_Name FROM dept Where Faculty_id = '6'  ");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Dept_id'].','.$rs['Dept_Name'].'">'.$rs['Dept_Name'].'</li>';                     
                        } 
                        ?>
                                        
                                      </ol>

   <?php
                    $sql = $db->prepare("SELECT Faculty_id,Faculty_name FROM faculty Where Faculty_id = '7'");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Faculty_id'].','.$rs['Faculty_name'].'">'.$rs['Faculty_name'].'</li>';                     
                        } 
                        ?>
                                      <ol>
                                        <?php
                    $sql = $db->prepare("SELECT Dept_id,Dept_Name FROM dept Where Faculty_id = '7'  ");
                      $sql->execute();
                      while ($rs = $sql->fetch()) 
                          {
                      echo '<li value="'.$rs['Dept_id'].','.$rs['Dept_Name'].'">'.$rs['Dept_Name'].'</li>';                     
                        } 
                        ?>
                                        
                                      </ol>
                                </ul>      
                                </div>
                           </div>
                       </div>

                      
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php require_once '../libs/js.php'; ?>
</body>
</html>