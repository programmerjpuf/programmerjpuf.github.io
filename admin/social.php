<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<h2>Update Social Profile</h2>
				<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$facebook 	= $fm->validation($_POST['facebook']);
						$twitter 	= $fm->validation($_POST['twitter']);
						$instagram 	= $fm->validation($_POST['instagram']);
						$google 	= $fm->validation($_POST['google']);
						$yahoo 		= $fm->validation($_POST['yahoo']);
						$youtube 	= $fm->validation($_POST['youtube']);
						
						$facebook 	= mysqli_real_escape_string($db->link, $facebook);
						$twitter 	= mysqli_real_escape_string($db->link, $twitter);
						$instagram 	= mysqli_real_escape_string($db->link, $instagram);
						$google 	= mysqli_real_escape_string($db->link, $google);
						$yahoo 		= mysqli_real_escape_string($db->link, $yahoo);
						$youtube 	= mysqli_real_escape_string($db->link, $youtube);
					
				if($facebook == "" || $twitter == "" || $instagram == "" || $google == "" || $yahoo == "" || 	$youtube == ""){
						echo "<span class='error'>Field Must Not be Empty!!</span>";
						}else{$query = "UPDATE tbl_social
								SET
								facebook	=	'$facebook',
								twitter		=	'$twitter',
								instagram	=	'$instagram',
								google		=	'$google',
								yahoo		=	'$yahoo',
								youtube		=	'$youtube'
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
					
					$query = "select * from tbl_social where id = '1'";
					$updatesocial = $db->select($query);
						if($updatesocial){
							while($updatesocialresult = $updatesocial->fetch_assoc()){
				?>
			<form action="" method="post">
					<table>
						<tr>
							<td>Facebook</td>
							<td><input type="text" name="facebook" value="<?php echo $updatesocialresult['facebook'];?>"/></td>
						</tr>
						<tr>
							<td>Twitter</td>
							<td><input type="text" name="twitter" value="<?php echo $updatesocialresult['twitter'];?>"/></td>
						</tr>
						<tr>
							<td>Instagram</td>
							<td><input type="text" name="instagram" value="<?php echo $updatesocialresult['instagram'];?>"/></td>
						</tr>
						<tr>
							<td>Google</td>
							<td><input type="text" name="google" value="<?php echo $updatesocialresult['google'];?>"/></td>
						</tr>
						<tr>
							<td>Yahoo</td>
							<td><input type="text" name="yahoo" value="<?php echo $updatesocialresult['yahoo'];?>"/></td>
						</tr>
						<tr>
							<td>Youtube</td>
							<td><input type="text" name="youtube" value="<?php echo $updatesocialresult['youtube'];?>"/></td>
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