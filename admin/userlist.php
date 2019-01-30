<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<div class="catoption">
					
					<?php 
						$query = "SELECT * FROM tbl_user";
						$value = $db->select($query);
						$count = mysqli_num_rows($value);
								echo "Shows";
								?>
								<table>
								<table id="totalid"> 
								<tr>
								<td></td>
								<td><?php echo $count;?><i class="fa fa-caret-down" style="float:right;margin-right: 3.5px;margin-top: 2px;"></i></td>
								</tr>
								</table>
								<h6 id="entries">entries</h6>
								
					<h2>User List</h2>
					<?php
						if(isset($_GET['deluser'])){
							$deluser = $_GET['deluser'];
							$delquery = "delete from tbl_user where id = '$deluser'";
							$deldata = $db->delete($delquery);
							if($deldata){
								echo "<span class='success'>User Deleted Successfully</span>";
						}else{
							echo "<span class='error'>User Not Deleted</span>";
						}	
							}
					?>
					
					<table class="mytable">
						<tr>
							<th width="7%">Serial No.</th>
							<th width="15%">Name</th>
							<th width="13%">Username</th>
							<th width="20%">Email</th>
							<th width="20%">Details</th>
							<th width="10%">Role</th>
							<th width="15%">Action</th>
						</tr>
						<?php
							$query = "select * from tbl_user order by id desc";
							$user = $db->select($query);
							if($user){
								$i=0;
								while($result = $user->fetch_assoc()){
									$i++;
						?>
						
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['username'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShorten($result['details'], 25);?></td>
							<td>
							<?php 
							if($result['role'] == '1'){
								echo "Admin";
							}elseif($result['role'] == '2'){
								echo "Editor";
							}elseif($result['role'] == '3'){
								echo "Author";
							}
							?>
							</td>
							
							<td><a href="viewuser.php?userid=<?php echo $result['id'];?>">View</a>
							
							<?php if(Session::get('userRole') == '1'){ ?>
							||<a onclick="return confirm('Are you sure to delete');" href="?deluser=<?php echo $result['id'];?>">Delete</a></td>
							<?php } ?>
						</tr>
						<?php } } ?>
					</table>
					
				</div>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>