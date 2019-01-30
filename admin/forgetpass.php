<?php 
include '../inc/Session.php';
Session::checkLogin();
?>
<?php include '../inc/config.php';?>
<?php include '../inc/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php
	$db = new Database();
	$fm	= new Format();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Panel</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  
  <div class="loginpage">
    <?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = $fm->validation($_POST['email']);
		$email = mysqli_real_escape_string($db->link, $email);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo "<span style='color:red'; font-size:14px;>Invalid email address!!</span>";
			}else{
				$mailquery = "select * from tbl_user where email='$email' limit 1";
				$mailcheck = $db->select($mailquery);
				if($mailcheck != false){
					while($value = $mailcheck->fetch_assoc()){
						$userid = $value['id'];
						$username = $value['username'];
					}
				$text = substr($email, 0, 3);
				$rand = rand(10000, 99999);
				$newpass = "$text$rand";
				$password = md5($newpass);
				
				$updatequery = 	"UPDATE tbl_user
								SET
								password='$password'
								WHERE id = '$userid'";
				
				$updated_row = $db->update($updatequery);
				$to = "$email";
				$from = "mamunwebd@gmail.com";
				$headers = "From: $from\n";
				$headers .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$subject = "Your Password";
				$message = "Your username is ".$username." and password is ".$newpass.".Please visit website to login";
				
				$sendmail = mail($to, $subject, $message, $headers);
				
				if($sendmail){
					echo "<span style='color:green'; font-size:14px;>Please check your email for new password.</span>";
				}else{
					echo "<span style='color:red'; font-size:14px;>Email not sent!!</span>";
				}
				}else{
					echo "<span style='color:red'; font-size:14px;>Email not exist!!</span>";
			}
		}
	}
  ?>
  <h2>Recovery Password</h2>
	<form action="" method="post">
		<div>
			<label>Email</label>
			<input type="text" name="email" placeholder="Enter valid email..." required=""/>
		</div>
		
		<div>
			<input type="submit" name="submit" value="Send"/>
		</div>
	</form>
	<div id="button">
		<a href="login.php">login</a>
	</div>
  </div>
</body>
</html>
