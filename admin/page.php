<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
				<h2>Edit Page</h2>
				
				<?php
					if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
						header("Location:index.php");
					}else{
						$id = $_GET['pageid'];
					}
				?>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$name = mysqli_real_escape_string($db->link, $_POST['name']);
					$body = mysqli_real_escape_string($db->link, $_POST['body']);

					if($name == "" || $body == "") {
						echo "<span class='error'>Field Must Not be Empty!!</span>";
						}else{
							$query = "UPDATE tbl_page
								SET
								name='$name',
								body='$body'
								WHERE id = '$id'";
						$updated_row = $db->update($query);
						if($updated_row){
							echo "<span class='success'>Page Updated Successfully.</span>";
					
						}else { 
							echo "<span class='error'>Page Not Updated !!</span>";
						}
					}
				}
				?>
				<form action="" method="post">
				<?php
					$query = "select * from tbl_page where id = '$id'";
					$page = $db->select($query);
					if($page){
						while($result=$page->fetch_assoc()){
				?>
					<table>
						<tr>
							<td>Name</td>
							<td><input type="text" name="name" value="<?php echo $result['name'];?>"/></td>
						</tr>

						<tr>
							<td>Description</td>
							<td><textarea class="tinymce" name="body">
							<?php echo $result['body'];?>"
							</textarea> 
							<script>CKEDITOR.replace( 'body' );</script>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
							<input type="submit" name="submit" value="Update"/>
							<span class="delaction"><a onclick="return confirm('Are you sure to delete');" href="deletepage.php?delpage=<?php echo $result['id'];?>">Delete</a></span>
							</td>
						</tr>
					</table>
				</form>
			<?php } } ?>
			</div>
			</div>
	</article>
	</section>
<?php include 'inc/footer.php';?>

