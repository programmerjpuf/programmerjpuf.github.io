</div>
	<div class="footersection templet clear">
		<div class="footermenu clear">
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
		<div class="copyright clear">	
			<?php 
				$query = "select * from tbl_copyright where id = '1'";
				$copyright = $db->select($query);
					if($copyright){
						while($copyrightresult = $copyright->fetch_assoc()){
			?>
				<p>
				&copy; <?php echo $copyrightresult['copyright'];?> <?php echo date('Y');?>
				</p>
			<?php } } ?>
		</div>
	</div>
	<div class="sidesocialicon clear">
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

<script type="text/javascript" src="js/scrolltop.js"></script>


</body>
</html>