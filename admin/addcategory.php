<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<h2>Add Category</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$name = $_POST['name'];	
					$name = mysqli_real_escape_string($db->link, $name);
					if(empty($name)){
						echo "<span class='error'>Field must not be empty!!</span>";
					}else{
						$query = "INSERT INTO tbl_category(name) VALUES ('$name')";
						$catinsert = $db->insert($query);
						if($catinsert){
							echo "<span class='success'>Category Inserted Successfully</span>";
						}else{
							echo "<span class='error'>Category Not Inserted</span>";
						}	
					}
					}
				?>
				
				<form action="" method="post">
					<table>
						<tr>
							<td>Add Category</td>
							<td><input type="text" name="name" placeholder="Add your category"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Add"/></td>
						</tr>
					</table>
				</form>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>