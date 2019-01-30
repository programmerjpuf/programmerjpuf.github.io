<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
				<h2>Reply Message</h2>
				<?php
					if(!isset($_GET['replyid']) || $_GET['replyid'] == NULL){
						header("Location:inbox.php");
					}else{
						$replyid = $_GET['replyid'];
					}
				?>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$toEmail 	= $fm->validation($_POST['toEmail']);
					$fromEmail 	= $fm->validation($_POST['fromEmail']);
					$subject 	= $fm->validation($_POST['subject']);
					$message 	= $fm->validation($_POST['message']);
					
					$sendmail	= mail($toEmail, $fromEmail, $subject, $message);
					if($sendmail){
						echo "<span class='success'>Message Sent Successfully.</span>";
					}else {
						echo "<span class='error'>Something Went Wrong!!</span>";
					}
					}
					?>
					
				<?php
					$query = "select * from tbl_contact where id = '$replyid'";
					$reply = $db->select($query);
						while($replymsg = $reply->fetch_assoc()){
				?>
				<form action="" method="post">
					<table>
						<tr>
							<td>To</td>
							<td><input type="text" name="toEmail" value="<?php echo $replymsg['email'];?>"/></td>
						</tr>
						<tr>
							<td>From</td>
							<td><input type="text" name="fromEmail" placeholder="Enter your email address"/></td>
						</tr>
						<tr>
							<td>Subject</td>
							<td><input type="text" name="subject" placeholder="Enter your subject"/></td>
						</tr>
						<tr>
							<td>Message</td>
							<td><textarea class="tinymce" name="message"></textarea> 
							<script>CKEDITOR.replace( 'message' );</script>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Send"/></td>
						</tr>
					</table>
				</form>
			<?php } ?>
			</div>
			</div>
	</article>
	</section>
<?php include 'inc/footer.php';?>

