<?php
		if(isset($_GET['pageid'])){
		$id = $_GET['pageid'];
	
		$query = "select * from tbl_page where id = '$id'";
		$page = $db->select($query);
		if($page){
			while($result=$page->fetch_assoc()){ ?>
				<title><?php echo $result['name'];?> - <?php echo TITLE;?></title>
		<?php } } } 
		
		elseif(isset($_GET['id'])){
		$postid = $_GET['id'];
	
		$query = "select * from tbl_post where id = '$postid'";
		$post = $db->select($query);
		if($post){
			while($result=$post->fetch_assoc()){ ?>
		<title><?php echo $result['title'];?> - <?php echo TITLE;?></title>
		<?php } } } 
		
		else { ?>
		<title><?php echo $fm->title();?> - <?php echo TITLE;?></title>
		<?php } ?>

<meta name="language" content="English">
<meta name="Description" content="It is a website about me">
<meta name="Keywords" content="Mamun,Muhit,Mukti,Ayesha,php,java,css,html">
<meta name="author" content="Mamun">