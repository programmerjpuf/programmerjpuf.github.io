<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<h2>Update Copyright Option</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
								$copyright 	= $fm->validation($_POST['copyright']);
								$copyright 	= mysqli_real_escape_string($db->link, $copyright);

					if($copyright == "" ){
						echo "<span class='error'>Field Must Not be Empty!!</span>";
						}else{$query = "UPDATE tbl_copyright
								SET
								copyright	=	'$copyright'
								WHERE id 	= 	'1'";
								
								$updated_row = $db->update($query);
								if ($updated_row) {
								 echo "<span class='success'>Data Updated Successfully.</span>";
								}else {
								 echo "<span class='error'>Data Not Updated !!</span>";
								}
							}
						}
				?>
				<?php 
					
					$query = "select * from tbl_copyright where id = '1'";
					$copyright = $db->select($query);
						if($copyright){
							while($copyrightresult = $copyright->fetch_assoc()){
				?>
			<form action="" method="post">
					<table>
						<tr>
							<td>Update Copyright</td>
							<td><input type="text" name="copyright" value="<?php echo $copyrightresult['copyright'];?>"/></td>
						</tr>
						<tr>	
							<td></td>
							<td>
							<input type="submit" name="submit" value="Update"/>
							</td>
						</tr>
				</table>
			</form>
			<?php } } ?>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>