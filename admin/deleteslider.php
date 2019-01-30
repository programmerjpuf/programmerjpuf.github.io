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
		if(!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL){
			header("Location:sliderlist.php");
		}else{
			$sliderid = $_GET['sliderid'];
			
			$query = "select * from tbl_slider where id='$sliderid'";
			$delslider = $db->select($query);
			if($delslider){
				while($delimage = $delslider->fetch_assoc()){
					$dellink = $delimage['image'];
					unlink($dellink);
				}
			}
			$delquery = "delete from tbl_slider where id='$sliderid'";
			$delslider = $db->delete($delquery);
			if($delslider){
				echo "<script>alert('Slider Deleted Successfully.');</script>";
				echo "<script>window.location = 'sliderlist.php';</script>";
			}else {
				echo "<script>alert('Slider Not Deleted');</script>";
				echo "<script>window.location = 'sliderlist.php';</script>";
			}
		}
	?>