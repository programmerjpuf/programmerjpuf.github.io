<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
				<h2>Update Post</h2>
				<?php
					if(!isset($_GET['editid']) || $_GET['editid'] == NULL){
						header("Location:postlist.php");
					}else{
						$editid = $_GET['editid'];
					}
				?>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$title = mysqli_real_escape_string($db->link, $_POST['title']);
					$cat = mysqli_real_escape_string($db->link, $_POST['cat']);
					$body = mysqli_real_escape_string($db->link, $_POST['body']);
					$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
					$author = mysqli_real_escape_string($db->link, $_POST['author']);
					$userid = mysqli_real_escape_string($db->link, $_POST['userid']);
					
					$permited  = array('jpg', 'jpeg', 'png', 'gif');
					$file_name = $_FILES['image']['name'];
					$file_size = $_FILES['image']['size'];
					$file_temp = $_FILES['image']['tmp_name'];

					$div = explode('.', $file_name);
					$file_ext = strtolower(end($div));
					$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
					$uploaded_image = "../images/".$unique_image;
					
					if($title == "" || $cat == "" || $body == "" || $tags == "" || $author == "" ){
						echo "<span class='error'>Field Must Not be Empty!!</span>";
					}else{
						if(!empty($file_name)){
							if ($file_size >1048567) {
							 echo "<span class='error'>Image Size should be less then 1MB!
							 </span>";
					
							} elseif (in_array($file_ext, $permited) === false) {
							 echo "<span class='error'>You can upload only:-"
							 .implode(', ', $permited)."</span>";
							
						} else{
							move_uploaded_file($file_temp, $uploaded_image);
							$query = "UPDATE tbl_post
								SET
								cat='$cat',
								title='$title',
								body='$body',
								image='$uploaded_image',
								author='$author',
								tags='$tags',
								userid='$userid'
								WHERE id = '$editid'";
								
								$updated_row = $db->update($query);
								if ($updated_row) {
								 echo "<span class='success'>Data Updated Successfully.</span>";
							}else {
							 echo "<span class='error'>Data Not Updated !!</span>";
					    }
					}
				}			else{
								$query = "UPDATE tbl_post
								SET
								cat='$cat',
								title='$title',
								body='$body',
								author='$author',
								tags='$tags',
								userid='$userid'
								WHERE id = '$editid'";
						
								$updated_row = $db->update($query);
								if ($updated_row) {
								 echo "<span class='success'>Data Updated Successfully.</span>";
							}else {
							 echo "<span class='error'>Data Not Updated !!</span>";
						}
					}
				}
			}
				?>
				<?php
					$query = "select * from tbl_post where id = '$editid' order by id desc";
					$editpost = $db->select($query);
						while($editpostresult = $editpost->fetch_assoc()){
				?>
				<form action="" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Title</td>
							<td><input type="text" name="title" value="<?php echo $editpostresult['title'];?>"/></td>
						</tr>
						
						<tr>
							<td>Category</td>
							<td>
								<select id="select" name="cat">
									<option>Select Category</option>
									<?php
										$query = "select * from tbl_category";
										$category = $db->select($query);
										if($category){
											while($result = $category->fetch_assoc()){
											
									?>
									<option 
									<?php
									if($editpostresult['cat']==$result['id']){ ?>
										selected="selected"
									<?php } ?>
									
									
									value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
								<?php } } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Upload Image</td>
							<td><img src="<?php echo $editpostresult['image'];?>" height="60px" width="50px"/><br/>
							<input type="file" name="image"/></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><textarea class="tinymce" name="body">"<?php echo $editpostresult['body'];?>"</textarea> 
							<script>CKEDITOR.replace( 'body' );</script>
							</td>
						</tr>
						<tr>
							<td>Tags</td>
							<td><input type="text" name="tags" value="<?php echo $editpostresult['tags'];?>"/></td>
						</tr>
						<tr>
							<td>Author</td>
							<td><input type="text" name="author" value="<?php echo $editpostresult['author'];?>"/></td>
						</tr>
						<tr>
							<td><input type="hidden" name="userid" value="<?php echo Session::get('userID');?>"/></td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Submit"/></td>
						</tr>
					</table>
				</form>
			<?php } ?>
			</div>
			</div>
	</article>
	</section>
<?php include 'inc/footer.php';?>

