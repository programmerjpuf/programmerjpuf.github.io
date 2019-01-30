<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$firstname = $fm->validation($_POST['firstname']);
			$lastname = $fm->validation($_POST['lastname']);
			$email = $fm->validation($_POST['email']);
			$body = $fm->validation($_POST['body']);
			
			$firstname = mysqli_real_escape_string($db->link, $firstname);
			$lastname = mysqli_real_escape_string($db->link, $lastname);
			$email = mysqli_real_escape_string($db->link, $email);
			$body = mysqli_real_escape_string($db->link, $body);
			
			
			$errorf = "";
			$errorl = "";
			$errore = "";
			$errorie = "";
			$errorb = "";
			if(empty($firstname)){
				$errorf = "First name must not be empty !!";
			}if(empty($lastname)){
				$errorl = "Last name must not be empty !!";
			}if(empty($email)){
				$errore = "Email field must not be empty !!";
			}if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errorie = "Invalid email address!!";
			}if(empty($body)){
				$errorb = "Message field must not be empty !!";
			}else{
				$query = "INSERT INTO tbl_contact(firstname, lastname, email, body) VALUES('$firstname', '$lastname', '$email', '$body')";
					$inserted_rows = $db->insert($query);
					if ($inserted_rows) {
					$msg = "Message sent successfully";
				}else { 
					$error = "Message not sent!!";
				}
			}
		}
	?>
	<div class="contentsection contemplet clear">
		<div class="maincontent clear">
			<div class="about clear">
				<h2>Contact me</h2>
					
					<form action="" method="post">
						<table>
							<?php 
							
								if(isset($error)){
									echo "<span style='color:red'>$error</span>";
								}
								if(isset($msg)){
									echo "<span style='color:green'>$msg</span>";
								}
								
							?>
							<tr>
								<td>First Name:</td>
								<td>
								<?php
									if(isset($errorf)){
									echo "<span style='color:red'>$errorf</span>";
									}
								?>
								<input type="text" name="firstname" placeholder="Enter your first name"/>
								</td>
							</tr>
							<tr>
								<td>Last Name:</td>
								<td>
								<?php
									if(isset($errorl)){
									echo "<span style='color:red'>$errorl</span>";
									}
								?>
								<input type="text" name="lastname" placeholder="Enter your last name"/>
								</td>
							</tr>
							<tr>
								<td>Email Address:</td>
								<td>
								<?php
									if(isset($errore)){
									echo "<span style='color:red'>$errore</span>";
									}elseif(isset($errorie)){
									echo "<span style='color:red'>$errorie</span>";
									}
								?>
								<input type="text" name="email" placeholder="Enter your email address"/>
								</td>
							</tr>
							<tr>
								<td>Message:</td>
								<td>
								<?php
									if(isset($errorb)){
									echo "<span style='color:red'>$errorb</span>";
									}
								?>
								<textarea name="body"></textarea>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Send"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
<?php include 'inc/sidebar.php';?>		
<?php include 'inc/footer.php';?>	