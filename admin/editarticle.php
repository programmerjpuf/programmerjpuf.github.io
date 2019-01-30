<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
				<h2>Add Article</h2>
				<form action="" method="" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Title</td>
							<td><input type="text" name="title" placeholder="Please enter title"/></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><textarea name="editor1"></textarea> 
							<script>CKEDITOR.replace( 'editor1' );</script>
							</td>
						</tr>
						<tr>
							<td>Category</td>
							<td>
								<select name="category">
									<option value="health">Health</option>
									<option value="sports">Sports</option>
									<option value="education">Education</option>
									<option value="national">National</option>
									<option value="international">International</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Tags</td>
							<td><input type="text" name="tags" placeholder="Please enter tags seperated by comma"/></td>
						</tr>
						<tr>
							<td>Upload Image</td>
							<td><input type="file" name="image"</td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Add"/></td>
						</tr>
					</table>
				</form>
			</div>
			</div>
	</article>
	</section>
<?php include 'inc/footer.php';?>