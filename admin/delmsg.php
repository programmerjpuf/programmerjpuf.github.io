<?php 
include '../inc/Session.php';
Session::checkSession();
?>
<?php include '../inc/config.php';?>
<?php include '../inc/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php
	$db = new Database();
?>
	<?php
		if(isset($_GET['delid'])){ 
		$delid = $_GET['delid'];
			$delquery = "delete from tbl_contact where id='$delid'";
			$delid = $db->delete($delquery);
			if($delid){
				echo "<script>alert('Message Deleted Successfully.');</script>";
				echo "<script>window.location = 'inbox.php';</script>";
			}else {
				echo "<script>alert('Message Not Deleted');</script>";
				echo "<script>window.location = 'inbox.php';</script>";
			}
		}
	?>
	<?php include 'inc/footer.php';?>