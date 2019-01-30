<?php include 'inc/config.php';?>
<?php include 'inc/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php
	$db = new Database();
	$fm	= new Format();
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'scripts/meta.php';
		include 'scripts/css.php';
		include 'scripts/js.php';
	?>


</head>
<body>
	<div class="headersection templet clear">
	<a href="index.php">
	<?php 
		$query = "select * from title_slogan where id='1'";
		$title = $db->select($query);
		if($title){
			while($titleresult = $title->fetch_assoc()){
	?>
	<div class="logo clear">
		<img src="admin/<?php echo $titleresult['logo'];?>" alt="logo"/>
		<h2><?php echo $titleresult['title'];?><h2/>
		<p><?php echo $titleresult['slogan'];?><p/>
	</div>
	<?php } } ?>
	</a>
		<div class="social clear">
			<div class="icon">
			<?php 
				$query = "select * from tbl_social where id = '1'";
				$updatesocial = $db->select($query);
					if($updatesocial){
						while($updatesocialresult = $updatesocial->fetch_assoc()){
				?>
				<a href="<?php echo $updatesocialresult['facebook'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $updatesocialresult['twitter'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $updatesocialresult['instagram'];?>" target="_blank"><i class="fa fa-instagram"></i></a>
				<a href="<?php echo $updatesocialresult['google'];?>" target="_blank"><i class="fa fa-google"></i></a>
				<a href="<?php echo $updatesocialresult['yahoo'];?>" target="_blank"><i class="fa fa-yahoo"></i></a>
				<a href="<?php echo $updatesocialresult['youtube'];?>" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php } } ?>
			</div>
			<div class="searchbtn clear">
				<form action="search.php" method="get">
					<input type="text" name="search" placeholder="Search Keyword"/>
					<input type="submit" name="submit" value="Search"/>
				</form>
			</div>
		</div>
	</div>
	<div class="navsection templet">
		<?php 
			$path = $_SERVER['SCRIPT_FILENAME'];
			$currentpage = basename($path, '.php');
		?>
		<ul>
			<li><a 
				<?php 
				 if($currentpage == 'index'){echo 'id="active"';} ?>
					href="index.php">Home</a></li>
				<?php 
					$query = "select * from tbl_page";
					$page  = $db->select($query);
						if($page){
						while($result = $page->fetch_assoc()){
				?>
				<li><a 
					<?php 
						if(isset($_GET['pageid']) && $_GET['pageid'] == $result['id']){
						echo 'id="active"';
					}
					?>
				href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
				<?php } }?>
			<li><a <?php 
				 if($currentpage == 'gallery'){echo 'id="active"';} ?>
				 href="gallery.php">Gallery</a>
				<ul>
					<li><a href="#">Photo</a></li>
				</ul>
			</li>
			<li><a <?php 
				 if($currentpage == 'video'){echo 'id="active"';} ?>
				 href="video.php">Video</a></li>
			<li><a <?php 
				 if($currentpage == 'webmail'){echo 'id="active"';} ?>
				 href="webmail.php">Webmail</a></li>
			<li><a <?php 
				 if($currentpage == 'contact'){echo 'id="active"';} ?>
				 href="contact.php">Contact</a></li>
		</ul>
	</div>
	