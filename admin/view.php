<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
				<h2>Update Post</h2>
				<?php
					if(!isset($_GET['viewid']) || $_GET['viewid'] == NULL){
						header("Location:inbox.php");
					}else{
						$viewid = $_GET['viewid'];
					}
				?>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						header("Location:inbox.php");
					}
					?>
					
				<?php
					$query = "select * from tbl_contact where id = '$viewid'";
					$view = $db->select($query);
						while($viewmsg = $view->fetch_assoc()){
				?>
				<form action="" method="post">
					<table>
						<tr>
							<td>Name</td>
							<td><input type="text" readonly value="<?php echo $viewmsg['firstname'].' '.$viewmsg['lastname'];?>"/></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" readonly value="<?php echo $viewmsg['email'];?>"/></td>
						</tr>
						<tr>
							<td>Date</td>
							<td><input type="text" value="<?php echo $fm->formatDate($viewmsg['date']);?>"/></td>
						</tr>
						

						<tr>
							<td>Message</td>
							<td><textarea class="tinymce" readonly name="body">"<?php echo $viewmsg['body'];?>"</textarea> 
							<script>CKEDITOR.replace( 'body' );</script>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Ok"/></td>
						</tr>
					</table>
				</form>
			<?php } ?>
			</div>
			</div>
	</article>
	</section>
<?php include 'inc/footer.php';?>

