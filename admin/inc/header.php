<?php 
include '../inc/Session.php';
Session::checkSession();
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 
 <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
	<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="main.css">
  <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.ui.core.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
  <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
  
  <script src="js/table/table.js" type="text/javascript"></script>
  <script src="js/setup.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready(function(){
	  setupLeftMenu();
	  setSidebarHeight();
  });
  </script>
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


  <div class="template">
	<?php
		if(isset($_GET['action']) && $_GET['action'] == "logout"){
			Session::destroy();
		}
	?>
<div class="headeroption templet clear">
	<div class="logotitle clear">
		<div class="logo clear">
			<img src="img/1.jpg"/>
		</div>
		<div class="titleslogan clear">
			<h2>Admin Panel</h2>
			<p>This is Muhit's Site Admin Panel</p>
		</div>
		<div class="login clear">
			<?php 
			$userid 	= Session::get('userID');
			$query = "select *from tbl_user where id ='$userid'";
			$queryimage = $db->select($query);
				if($queryimage){
				while($result = $queryimage->fetch_assoc()){ ?>
			<img src= "<?php echo $result['image'];?>" id="profileimage"/> 
			
				<?php } } ?>
			
			<h6>Hello <?php echo Session::get('username');?></h6>
			<li><a href="?action=logout">| Logout</i></a></li>
		</div>
	</div>

	<div class="mainmenu template">
		<ul>
			<li><a href="index.php" <i class="fa fa-home"></i></a>
			<li><a href="inbox.php" <i class="fa fa-inbox">
				<?php
					$query = "select * from tbl_contact where status='0' order by id desc";
					$msg = $db->select($query);
					
					if($msg){
						$count = mysqli_num_rows($msg);
						echo "(".$count.")";
					}else{
						echo "(0)";
					}
				?>
			</i></a></li>
			
		</ul>
	</div>
</div>