<?php
error_reporting(0);
//for state of country selection 
	require_once 'db/db.php';
	if(isset($_GET['country'])){
		$c= $_GET['country'];
		?>
	<?php
		$sql = $db->prepare("SELECT state_name,country_id FROM states where country_id='$c' ");
		$sql->execute();
		while ($rs = $sql->fetch()) 
		{
		?>
		<option value="" <?php if($rs["state_id"]==@$_REQUEST["country_id"]) { echo "Selected"; } ?>><?php echo $rs["state_id"]; ?></option>
		<?php
		}
		
		?>

		<?php
	exit();
	}
//for local government a state  selection 
if(isset($_GET['state'])){
		$c= $_GET['state'];

		?>

		<?php
		  $sql = $db->prepare("SELECT lga_id as state_id,lga_name as state_name FROM city where state_name='$c' ");
 		  $sql->execute();
			while ($rs = $sql->fetch()) 
			{
		  ?>
		<option value="" ><?php echo $rs["state_name"]; ?></option>
		<?php
		}
		?>
		<?php
	exit();
	}
//for faculty and dept selection 
	if(isset($_GET['dept'])){
		$c= $_GET['dept'];
		?>
		<?php	
			$sql = $db->prepare("SELECT Dept_id as Faculty_id, Dept_Name FROM dept where Faculty_id='$c' ");	
			$sql->execute();
				while ($rs = $sql->fetch()) 
		{
	?>
	<option value="<?php echo $rs["Dept_Name"]; ?>" <?php if($rs["Dept_id"]==@$_REQUEST["Faculty_id"]) { echo "Selected"; } ?>><?php echo $rs["Dept_Name"]; ?></option>
	<?php
	}
	?>
<?php
exit();
}