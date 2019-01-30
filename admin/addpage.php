<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
				<h2>Create New Page</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$name = mysqli_real_escape_string($db->link, $_POST['name']);
					$body = mysqli_real_escape_string($db->link, $_POST['body']);

					if($name == "" || $body == "") {
						echo "<span class='error'>Field Must Not be Empty!!</span>";
						}else{
							$query = "INSERT INTO tbl_page(name, body) VALUES('$name', '$body')";
						
							$inserted_rows = $db->insert($query);
							if ($inserted_rows) {
							echo "<span class='success'>Page Created Successfully.</span>";
					
						}else { 
							echo "<span class='error'>Page Not Created !!</span>";
						}
					}
				}
				?>
				<form action="" method="post">
					<table>
						<tr>
							<td>Name</td>
							<td><input type="text" name="name" placeholder="Please enter name"/></td>
						</tr>

						<tr>
							<td>Description</td>
							<td><textarea class="tinymce" name="body"></textarea> 
							<script>CKEDITOR.replace( 'body' );</script>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Create"/></td>
						</tr>
					</table>
				</form>
			</div>
			</div>
	</article>
	</section>
<?php include 'inc/footer.php';?>

