<div class="sidebar clear">
	<div class="samesidebar clear">
		<h2>Category</h2>
			<ul>
				<?php
					$query = "select *from tbl_category";
					$category  = $db->select($query);
					if($category){
						while($result = $category->fetch_assoc()){
				?>
					<li><a href="posts.php?category=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
				<?php } } else{ ?>
					<li>No Category Created</li>
				<?php } ?>
			</ul>
		<h2>Latest Articles</h2>
			<?php
				$query = "select *from tbl_post limit 3";
				$post  = $db->select($query);
				if($post){
					while($result = $post->fetch_assoc()){
			?>
	
		<div class="Popular clear">
				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h5><?php echo $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h5>
				<a href="post.php?id=<?php echo $result['id'];?>" target= "_blank"><img src="admin/<?php echo $result['image'];?>"  alt="muhit" /></a>
				<?php echo $fm->textShorten($result['body'], 80); ?>
			<div class="readmore clear">
				<a href="post.php?id=<?php echo $result['id'];?>" target= "_blank">Read More</a>
			</div>
		</div>
		<?php } } else{ header("Location:404.php");}?>
	
	</div>
</div>