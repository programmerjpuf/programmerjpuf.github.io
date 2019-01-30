<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<div class="catoption">
					<?php 
						$query = "SELECT * FROM tbl_post";
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
					<h2>Post List</h2>
					<table class="mytable" id="example">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th width="11%">Title</th>
								<th width="18%">Description</th>
								<th width="10%">Category</th>
								<th width="10%">Image</th>
								<th width="10%">Author</th>
								<th width="10%">Tags</th>
								<th width="10%">Date</th>
								<th width="16%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						
						global $target_page,$get_page;
						if(isset($_GET["page"])){
						$get_page = $_GET["page"];
						}
						if($get_page == "" || $get_page == "1"){
							$target_page = 1;
						}else{
							$target_page = ($get_page*2)-2;
						}
						?>
						<?php 
							$query = "SELECT tbl_post.*,tbl_category.name FROM tbl_post
							INNER JOIN tbl_category 
							ON tbl_post.cat = tbl_category.id
							ORDER BY tbl_post.title DESC limit $target_page,2";
							
							$post = $db->select($query);
							if($post){
								$i=0;
								while($result = $post->fetch_assoc()){
								$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->textShorten($result['body'],50);?></td>
							<td><?php echo $result['name'];?></td>
							<td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>
							<td><?php echo $result['author'];?></td>
							<td><?php echo $result['tags'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							
							<td>
							<a href="viewpost.php?viewid=<?php echo $result['id'];?>">View</a>
							<?php if(Session::get('userID') == $result['userid'] || Session::get('userRole') == '1') {?>
							||<a href="editpost.php?editid=<?php echo $result['id'];?>">Edit</a>
							||<a onclick="return confirm('Are you sure to delete');" href="deletepost.php?delid=<?php echo $result['id'];?>">Delete</a>
							<?php } ?>
							</td>
						</tr>
						<?php } }?>
						</tbody>
					</table>

					<?php 
					$query = "SELECT * FROM tbl_post";
					$value = $db->select($query);
					$count = mysqli_num_rows($value);
					$i = $count/2;
					$page = ceil($i);
					for($target=1; $target<=$page; $target++){
					?><span class='pagination'><a href="postlist.php?page=<?php echo $target;?>"><?php echo $target;?></a></span><?php
					}
					?>
				</div>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>