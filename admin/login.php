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
		$username = $fm->validation($_POST['username']);
		$password = $fm->validation(md5($_POST['password']));
		
		$username = mysqli_real_escape_string($db->link, $username);
		$password = mysqli_real_escape_string($db->link, $password);
		
		$query = "SELECT * FROM tbl_user WHERE username= '$username' AND password = '$password'";
		$result = $db->select($query);
		if($result!=false){
			$value = $result->fetch_assoc();
			Session::set("login", true);
			Session::set("username", $value['username']);
			Session::set("userID", $value['id']);
			Session::set("userRole", $value['role']);
			Session::set("userImage", $value['image']);
			header("Location:index.php");
			}else{
			echo "<span style='color:red'; font-size:14px;>Username or Password not matched!!</span>";
		}
	}
  ?>
  <h2>User Login</h2>
	<form action="login.php" method="post">
		<div>
			<label>Username</label>
			<input type="text" name="username" placeholder="Username" required=""/>
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password" placeholder="Password" required=""/>
		</div>
		<div>
			<input type="submit" name="submit" value="Submit"/>
		</div>
	</form>
	<div id="button">
		<a href="forgetpass.php">Forgot password?</a>
	</div>
  </div>
</body>

</html>
