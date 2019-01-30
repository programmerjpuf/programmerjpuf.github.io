<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				
				<?php
					$userid 	= Session::get('userID');
					$userrole	= Session::get('userRole');
					$userimage	= Session::get('userImage');
				?>
				<h2>User update</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$name 		= mysqli_real_escape_string($db->link, $_POST['name']);
					$username 	= mysqli_real_escape_string($db->link, $_POST['username']);
					$email 		= mysqli_real_escape_string($db->link, $_POST['email']);
					$details 	= mysqli_real_escape_string($db->link, $_POST['details']);
										
					$permited  = array('jpg', 'jpeg', 'png', 'gif');
					$file_name = $_FILES['image']['name'];
					$file_size = $_FILES['image']['size'];
					$file_temp = $_FILES['image']['tmp_name'];

					$div = explode('.', $file_name);
					$file_ext = strtolower(end($div));
					$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
					$uploaded_image = "../images/".$unique_image;
					
					if(!empty($file_name)){
						if ($file_size >1048567) {
						 echo "<span class='error'>Image Size should be less then 1MB!</span>";
						} elseif (in_array($file_ext, $permited) === false) {
						 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
					} else{
						move_uploaded_file($file_temp, $uploaded_image);
						$query = "UPDATE tbl_user
								SET
								name		=	'$name',
								username	=	'$username',
								email		=	'$email',
								image		=	'$uploaded_image',
								details		=	'$details'
								WHERE id 	= 	'$userid'";
								
						$updated_row = $db->update($query);
						if ($updated_row) {
						echo "<span class='success'>User Profile Updated Successfully.</span>";
							}else {
						echo "<span class='error'>User Profile Not Updated !!</span>";
						}
					}
				}	else{
					$query = "UPDATE tbl_user
							SET
							name		=	'$name',
							username	=	'$username',
							email		=	'$email',
							details		=	'$details'
							WHERE id 	= 	'$userid'";
					
						$updated_row = $db->update($query);
						if ($updated_row) {
						echo "<span class='success'>User Profile Updated Successfully.</span>";
							}else {
						echo "<span class='error'>User Profile Not Updated !!</span>";
						}
					}
				
				}	
				?>
				<?php
					$query = "select * from tbl_user where id = '$userid' AND role='$userrole'";
					$updateuser = $db->select($query);
						while($result = $updateuser->fetch_assoc()){
				?>
				<form action="" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Name</td>
							<td><input type="text" name="name" value="<?php echo $result['name'];?>"/></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" value="<?php echo $result['username'];?>"/></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email" value="<?php echo $result['email'];?>"/></td>
						</tr>
						<tr>
							<td>Upload Image</td>
							<td><img src="<?php echo $result['image'];?>" height="60px" width="50px"/><br/>
							<input type="file" name="image"/></td>
						</tr>
						<tr>
							<td>Details</td>
							<td><textarea class="tinymce" name="details">"<?php echo $result['details'];?>"</textarea> 
							<script>CKEDITOR.replace( 'details' );</script>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Update"/></td>
						</tr>
					</table>
				</form>
			<?php } ?>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>