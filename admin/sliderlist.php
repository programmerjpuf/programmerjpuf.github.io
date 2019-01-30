<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
		<article class="maincontent clear">
			<div class="content clear">
				<div class="catoption">
				<?php 
						$query = "SELECT * FROM tbl_slider";
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
					<h2>Slider List</h2>
					<table class="mytable" id="example">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th width="11%">Title</th>
								<th width="10%">Image</th>
								<th width="16%">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$query = "select *from tbl_slider";
							$slider = $db->select($query);
							if($slider){
								$i=0;
								while($result = $slider->fetch_assoc()){
								$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>
							
							<td>
							<?php if(Session::get('userRole') == '1') {?>
							<a href="editslider.php?sliderid=<?php echo $result['id'];?>">Edit</a>
							|| <a onclick="return confirm('Are you sure to delete');" href="deleteslider.php?sliderid=<?php echo $result['id'];?>">Delete</a>
							<?php } ?>
							</td>
						</tr>
						<?php } }?>
						</tbody>
					</table>
				</div>
			</div>
		</article>
	</section>
<?php include 'inc/footer.php';?>