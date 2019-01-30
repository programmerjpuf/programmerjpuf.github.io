<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
			<div class="addarticle clear">
				<h2>View Post</h2>
				<?php
					if(!isset($_GET['viewid']) || $_GET['viewid'] == NULL){
						header("Location:postlist.php");
					}else{
						$viewid = $_GET['viewid'];
					}
				?>
				<?php
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					header("Location:postlist.php");
				}	
				?>
				<?php
					$query = "select * from tbl_post where id = '$viewid' order by id desc";
					$viewpost = $db->select($query);
						while($viewresult = $viewpost->fetch_assoc()){
				?>
				<form action="" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Title</td>
							<td><input type="text" readonly name="title" value="<?php echo $viewresult['title'];?>"/></td>
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
									if($viewresult['cat']==$result['id']) { ?>
										selected="selected"
									<?php } ?>
									
									
									value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
								<?php } } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Image</td>
							<td><img src="<?php echo $viewresult['image'];?>" height="60px" width="50px"/><br/>
							<input type="file" readonly name="image"/></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><textarea class="tinymce" readonly name="body">"<?php echo $viewresult['body'];?>"</textarea> 
							<script>CKEDITOR.replace( 'body' );</script>
							</td>
						</tr>
						<tr>
							<td>Tags</td>
							<td><input type="text" readonly name="tags" value="<?php echo $viewresult['tags'];?>"/></td>
						</tr>
						<tr>
							<td>Author</td>
							<td><input type="text" readonly name="author" value="<?php echo $viewresult['author'];?>"/></td>
						</tr>
						<tr>
							<td><input type="hidden" name="userid" value="<?php echo Session::get('userID');?>"/></td>
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

