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
		if(!isset($_GET['delpage']) || $_GET['delpage'] == NULL){
			header("Location:index.php");
		}else{
			$delid = $_GET['delpage'];
			
			$delquery = "delete from tbl_page where id='$delid'";
			$delpage = $db->delete($delquery);
			if($delpage){
				echo "<script>alert('Page Deleted Successfully.');</script>";
				echo "<script>window.location = 'index.php';</script>";
			}else {
				echo "<script>alert('Page Not Deleted');</script>";
				echo "<script>window.location = 'index.php';</script>";
			}
		}
	?>