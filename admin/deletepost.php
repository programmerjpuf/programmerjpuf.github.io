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
		if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
			header("Location:postlist.php");
		}else{
			$delid = $_GET['delid'];
			
			$query = "select * from tbl_post where id='$delid'";
			$getdata = $db->select($query);
			if($getdata){
				while($delimage = $getdata->fetch_assoc()){
					$dellink = $delimage['image'];
					unlink($dellink);
				}
			}
			$delquery = "delete from tbl_post where id='$delid'";
			$deldata = $db->delete($delquery);
			if($deldata){
				echo "<script>alert('Data Deleted Successfully.');</script>";
				echo "<script>window.location = 'postlist.php';</script>";
			}else {
				echo "<script>alert('Data Not Deleted');</script>";
				echo "<script>window.location = 'postlist.php';</script>";
			}
		}
	?>