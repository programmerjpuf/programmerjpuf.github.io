<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<article class="maincontent clear">
	<div class="content clear">
		<h2>Themes</h2>
			<?php
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$theme = mysqli_real_escape_string($db->link, $_POST['theme']);
				$query = "UPDATE tbl_theme
						SET
						theme='$theme'
						WHERE id = '1'";
					$updated_row = $db->update($query);
					if($updated_row){
						echo "<span class='success'>Theme Updated Successfully</span>";
					}else{
						echo "<span class='error'>Theme Not Updated</span>";
					}	
				}
			?>
			<?php
				$query = "select * from tbl_theme where id = '1'";
				$themecolor = $db->select($query);
				while($result = $themecolor->fetch_assoc()){
			?>
			<form action="" method="post">
				<table>
					<tr>
						<td>
							<input <?php if($result['theme'] == 'default'){ echo "checked";}?> type="radio" name="theme" value="default"/> Default
						</td>
					</tr>
					<tr>
						<td>
							<input <?php if($result['theme'] == 'green'){ echo "checked";}?> type="radio" name="theme" value="green"/> Green
						</td>
					</tr>
					<tr>
						<td>
							<input <?php if($result['theme'] == 'red'){ echo "checked";}?> type="radio" name="theme" value="red"/> Red
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Change"/></td>
					</tr>
				</table>
			</form>
			<?php } ?>
		</div>
	</article>
	
<?php include 'inc/footer.php';?>