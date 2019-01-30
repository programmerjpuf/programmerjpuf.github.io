<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
	if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
		header("Location:catlist.php");
	}else{
		$id = $_GET['catid'];
	}
?>
		<article class="maincontent clear">
			<div class="content clear">
				<h2>Update Category</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$name = $_POST['name'];	
					$name = mysqli_real_escape_string($db->link, $name);
					if(empty($name)){
						echo "<span class='error'>Field must not be empty!!</span>";
					}else{
						$query = "UPDATE tbl_category
								SET
								name='$name'
								WHERE id = '$id'";
						$updated_row = $db->update($query);
						if($updated_row){
							echo "<span class='success'>Category Updated Successfully</span>";
						}else{
							echo "<span class='error'>Category Not Updated</span>";
						}	
					}
					}
				?>
				<?php
					$query = "select * from tbl_category where id = '$id' order by id desc";
					$category = $db->select($query);
					while($result=$category->fetch_assoc()){
				?>
				
				<form action="" method="post">
					<table>
						<tr>
							<td>Add Category</td>
							<td><input type="text" name="name" value="<?php echo $result['name'];?>"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Save"/></td>
						</tr>
					</table>
				</form>
			<?php } ?>
				<div class="catoption">
					<?php
							$query = "select * from tbl_category order by id desc";
							$category = $db->select($query);
							if($category){
								$i=0;
								while($result = $category->fetch_assoc()){
									$i++;
							}}
						?>
					</table>
				</div>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>