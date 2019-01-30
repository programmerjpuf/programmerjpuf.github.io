<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<div class="catoption">
					<h2>Inbox</h2>
					<?php
						if(isset($_GET['seenid'])){
						$seenid = $_GET['seenid'];
						$query = "UPDATE tbl_contact
								SET
								status ='1'
								WHERE id = '$seenid'";
						$updated_row = $db->update($query);
						if($updated_row){
							echo "<span class='success'>Message sent in the seen box successfully</span>";
						}else{
							echo "<span class='error'>Something Wrong!</span>";
						}}	
						?>					
					<table class="mytable">
						<tr>
							<th width="7%">Serial No.</th>
							<th width="20%">Name</th>
							<th width="25%">Email</th>
							<th width="25%">Message</th>
							<th width="10%">Date</th>
							<th width="13%">Action</th>
						</tr>
						<?php
							$query = "select * from tbl_contact where status='0' order by id desc";
							$category = $db->select($query);
							if($category){
								$i=0;
								while($result = $category->fetch_assoc()){
									$i++;
						?>
						
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShorten($result['body'], 20);?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><a href="view.php?viewid=<?php echo $result['id'];?>">View</a>||<a href="reply.php?replyid=<?php echo $result['id'];?>">Reply</a>||<a onclick="return confirm('Are you sure to move the message');" href="?seenid=<?php echo $result['id'];?>">Seen</a></td>
						</tr>
						<?php } } else { ?>
					<?php echo "<span class='error'>No message available now!</span>"; } ?>
					</table>
					
				</div>
				<div class="catoption">
				<div class="seenmsg clear">
					<h2>Seen Message</h2>
					<table class="mytable">
						<tr>
							<th width="7%">Serial No.</th>
							<th width="20%">Name</th>
							<th width="25%">Email</th>
							<th width="25%">Message</th>
							<th width="10%">Date</th>
							<th width="13%">Action</th>
						</tr>
						<?php
							$query = "select * from tbl_contact where status='1' order by id desc";
							$category = $db->select($query);
							if($category){
								$i=0;
								while($result = $category->fetch_assoc()){
									$i++;
						?>
						
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShorten($result['body'], 20);?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><a onclick="return confirm('Are you sure to delete the message');" href="delmsg.php?delid=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
							<?php } } else { ?>
					<?php echo "<span class='error'>No message available now!</span>"; } ?>
					</table>
					</div>
				</div>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>