<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<div class="catoption">
				<?php 
						$query = "SELECT * FROM tbl_category";
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
					<h2>Category List</h2>
					<?php
						if(isset($_GET['delcat'])){
							$delcat = $_GET['delcat'];
							$delquery = "delete from tbl_category where id = '$delcat'";
							$deldata = $db->delete($delquery);
							if($deldata){
								echo "<span class='success'>Category Deleted Successfully</span>";
						}else{
							echo "<span class='error'>Category Not Deleted</span>";
						}	
							}
					?>
					
					<table class="mytable">
						<tr>
							<th width="20%">No.</th>
							<th width="50%">Category Name</th>
							<th width="30%">Action</th>
						</tr>
						<?php
							$query = "select * from tbl_category order by id desc";
							$category = $db->select($query);
							if($category){
								$i=0;
								while($result = $category->fetch_assoc()){
									$i++;
						?>
						
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a>||<a onclick="return confirm('Are you sure to delete');" href="?delcat=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
						<?php } } ?>
					</table>
				</div>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>