<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<h2>User Profile</h2>
				<?php
					if(!isset($_GET['userid']) || $_GET['userid'] == NULL){
						header("Location:userlist.php");
					}else{
						$userid = $_GET['userid'];
					}
				?>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						header("Location:userlist.php");
					}
				?>
				<?php
					$query = "select * from tbl_user where id = '$userid'";
					$viewuser = $db->select($query);
						while($result = $viewuser->fetch_assoc()){
				?>
				<form action="" method="post">
					<table>
						<tr>
							<td>Name</td>
							<td><input type="text" readonly value="<?php echo $result['name'];?>"/></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" readonly value="<?php echo $result['username'];?>"/></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" readonly value="<?php echo $result['email'];?>"/></td>
						</tr>
						<tr>
							<td>Details</td>
							<td><textarea class="tinymce" name="details">"<?php echo $result['details'];?>"</textarea> 
							<script>CKEDITOR.replace( 'details' );</script>
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
		</article>
	</section>
<?php include 'inc/footer.php';?>