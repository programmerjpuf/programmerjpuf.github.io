<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<?php
					if(!Session::get('userRole') == '1'){
						header("Location:index.php");
					}
				?>
				<h2>Add User</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$username 	= $fm->validation($_POST['username']);	
					$password 	= $fm->validation(md5($_POST['password']));	
					$email 		= $fm->validation($_POST['email']);
					$role 		= $fm->validation($_POST['role']);
					
					$username 	= mysqli_real_escape_string($db->link, $username);
					$password 	= mysqli_real_escape_string($db->link, $password);
					$email 		= mysqli_real_escape_string($db->link, $email);
					$role 		= mysqli_real_escape_string($db->link, $role);
					
					if(empty($username) || empty($password) || empty($email) || empty($role)){
						echo "<span class='error'>Field must not be empty!!</span>";
					} else{
						$mailquery = "select * from tbl_user where email='$email' limit 1";
						$mailcheck = $db->select($mailquery);
						if($mailcheck != false){
							echo "<span class='error'>Email already exist!!</span>";
						}else {
						$query = "INSERT INTO tbl_user(username, password, email, role) VALUES('$username', '$password', '$email', '$role')";
						$userinsert = $db->insert($query);
						if($userinsert){
							echo "<span class='success'>User Created Successfully</span>";
						}else{
							echo "<span class='error'>User Not Created!!</span>";
						}	
					}
					}
					}
				?>
				
				<form action="" method="post">
					<table>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" placeholder="Enter username..."/></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="text" name="password" placeholder="Enter password..."/></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email" placeholder="Enter valid email..."/></td>
						</tr>
						<tr>
							<td>User Role</td>
							<td>
								<select id="select" name="role">
									<option>Select user role</option>
									<option value="1">Admin</option>
									<option value="2">Editor</option>
									<option value="3">Author</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Create"/></td>
						</tr>
					</table>
				</form>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>