<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
			
				<h2>Update Title, Slogan and Logo</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$title = $fm->validation($_POST['title']);
						$slogan = $fm->validation($_POST['slogan']);
						
						$title = mysqli_real_escape_string($db->link, $title);
						$slogan = mysqli_real_escape_string($db->link, $slogan);
						
						
						$permited  = array('jpg');
						$file_name = $_FILES['logo']['name'];
						$file_size = $_FILES['logo']['size'];
						$file_temp = $_FILES['logo']['tmp_name'];

						$div = explode('.', $file_name);
						$file_ext = strtolower(end($div));
						$same_image = 'logo'.'.'.$file_ext;
						$uploaded_image = "upload/".$same_image;
					
					if($title == "" || $slogan == "" ){
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
							$query = "UPDATE title_slogan
								SET
								title='$title',
								slogan='$slogan',
								logo='$uploaded_image'
								WHERE id = '1'";
								
								$updated_row = $db->update($query);
								if ($updated_row) {
								 echo "<span class='success'>Data Updated Successfully.</span>";
							}else {
							 echo "<span class='error'>Data Not Updated !!</span>";
					    }
					}
				}			else{
								$query = "UPDATE title_slogan
								SET
								title='$title',
								slogan='$slogan'
								WHERE id = '1'";
						
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
					$query = "select * from title_slogan where id='1'";
					$title = $db->select($query);
					if($title){
						while($titleresult = $title->fetch_assoc()){
				?>
				<div class="titleslogan clear">
				<div class="leftside clear">
					<form action="" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td>Update Title</td>
								<td><input type="text" name="title" value="<?php echo $titleresult['title'];?>"/></td>
							</tr>
							<tr>
								<td>Update Slogan</td>
								<td><input type="text" name="slogan" value="<?php echo $titleresult['slogan'];?>"/></td>
							</tr>
							<tr>
								<td>Upload Logo</td>
								<td><input type="file" name="logo"/></td>
							</tr>
							
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Update"/></td>
							</tr>
						</table>
					</form>
				</div>
				<div class="rightside clear">
					<img src="<?php echo $titleresult['logo'];?>" alt="Logo"/>
				</div>
			<?php } } ?>
			</div>
			</div>
		</div>
	</article>
	</section>
<?php include 'inc/footer.php';?>
