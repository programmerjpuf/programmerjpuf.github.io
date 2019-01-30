<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
				<h2>Update Post</h2>
				<?php
					if(!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL){
						header("Location:sliderlist.php");
					}else{
						$sliderid = $_GET['sliderid'];
					}
				?>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$title = mysqli_real_escape_string($db->link, $_POST['title']);
					
					$permited  = array('jpg', 'jpeg', 'png', 'gif');
					$file_name = $_FILES['image']['name'];
					$file_size = $_FILES['image']['size'];
					$file_temp = $_FILES['image']['tmp_name'];

					$div = explode('.', $file_name);
					$file_ext = strtolower(end($div));
					$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
					$uploaded_image = "../images/slider/".$unique_image;
					
					if($title == ""){
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
							$query = "UPDATE tbl_slider
									SET
									title	='$title',
									image	='$uploaded_image'
									WHERE id = '$sliderid'";
								
								$updated_row = $db->update($query);
								if ($updated_row) {
								 echo "<span class='success'>Slider Updated Successfully.</span>";
							}else {
							 echo "<span class='error'>Slider Not Updated !!</span>";
					    }
					}
				}			else{
								$query = "UPDATE tbl_slider
								SET
								title='$title',
								WHERE id = '$sliderid'";
						
								$updated_row = $db->update($query);
								if ($updated_row) {
								 echo "<span class='success'>Slider Updated Successfully.</span>";
							}else {
							 echo "<span class='error'>Slider Not Updated !!</span>";
						}
					}
				}
					}
				?>
				<?php
					$query = "select * from tbl_slider where id = '$sliderid'";
					$getslider = $db->select($query);
						while($result = $getslider->fetch_assoc()){
				?>
				<form action="" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Title</td>
							<td><input type="text" name="title" value="<?php echo $result['title'];?>"/></td>
						</tr>
							<td>Upload New Image</td>
							<td><img src="<?php echo $result['image'];?>" height="60px" width="50px"/><br/>
							<input type="file" name="image"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Update"/></td>
						</tr>
					</table>
				</form>
			<?php } ?>
			</div>
			</div>
	</article>
	</section>
<?php include 'inc/footer.php';?>

