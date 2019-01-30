<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>
	<div class="contentsection contemplet clear">
		<div class="maincontent clear">
			<?php
					if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
						header("Location:404.php");
					}else{
						$id = $_GET['pageid'];
					}
				?>
			<div class="samepost clear">
			<?php
					$query = "select * from tbl_page where id = '$id'";
					$page = $db->select($query);
					if($page){
						while($result=$page->fetch_assoc()){
				?>
				<h2><?php echo $result['name'];?></h2>
				<?php echo $result['body'];?>
					
			<?php } } ?>
			</div>
			
		</div>
<?php include 'inc/sidebar.php';?>		
<?php include 'inc/footer.php';?>	