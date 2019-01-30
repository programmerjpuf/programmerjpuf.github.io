<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<h2>Add Category</h2>
				<form>
					<table>
						<tr>
							<td>Add Category</td>
							<td><input type="text" name="category" placeholder="Add your category"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Add"/></td>
						</tr>
					</table>
				</form>
				<div class="catoption">
					<h2>Category List</h2>
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
							<td><a href="#">Edit</a>||<a href="#">Delete</a></td>
						</tr>
						<?php } } ?>
					</table>
				</div>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>