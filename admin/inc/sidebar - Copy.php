<section class="contentsection clear">
		<aside class="leftsidebar clear">
			<div class="sidebar" id="section-menu">
				<ul class="section menu">
					<li><a class="menuitem">User Option</a>
						<ul class="submenu">
							<?php if(Session::get('userRole') == '1'){ ?>
							<li><a href="adduser.php">Add User</a></li>
							<?php } ?>
							<li><a href="profile.php">Update User Profile</a></li>
							<li><a href="userlist.php">User List</a></li>
						</ul>
					</li>
				
					
					
				<div class="w3-container">
				<button onclick="myFunction('user')" class="w3-btn w3-block w3-left-align">User Option</button>
					
						<div id="user" class="w3-container w3-hide">
						  <li><a href="social.php">Social Option</a></li>
							<li><a href="titleslogan.php">Title & Slogan</a></li>
							<li><a href="copyright.php">Copyright Option</a></li>
						</div>

						</div>
						<script>
						function myFunction(id) {
						  var x = document.getElementById(id);
						  if (x.className.indexOf("w3-show") == -1) {
							x.className += " w3-show";
						  } else { 
							x.className = x.className.replace(" w3-show", "");
						  }
						}
						</script>
				
				
				
				
				
				
				
				<div class="w3-container">
				<button onclick="myFunction('social')" class="w3-btn w3-block w3-left-align">Site Option</button>
					
						<div id="social" class="w3-container w3-hide">
						  <li><a href="social.php">Social Option</a></li>
							<li><a href="titleslogan.php">Title & Slogan</a></li>
							<li><a href="copyright.php">Copyright Option</a></li>
						</div>

						</div>
						<script>
						function myFunction(id) {
						  var x = document.getElementById(id);
						  if (x.className.indexOf("w3-show") == -1) {
							x.className += " w3-show";
						  } else { 
							x.className = x.className.replace(" w3-show", "");
						  }
						}
						</script>
				
				
					<li><a class="menuitem">Pages</a>
						<ul class="submenu">
							<li><a href="addpage.php">Create New Page</a></li>
							<?php 
								$query = "select * from tbl_page";
								$page  = $db->select($query);
									if($page){
									while($result = $page->fetch_assoc()){
							?>
							<li><a href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
							<?php } }?>
						</ul>
					</li>
				
					<div class="w3-dropdown-hover">
					<button class="menuitem">Hover Over Me!</button>
						<div class="w3-dropdown-content w3-bar-block w3-border">
							<li><a href="bgchange.php" class="w3-bar-item w3-button">Change Site Background</a></li>
							<li><a href="fontchange.php" class="w3-bar-item w3-button">Change Site Fonts</a></li>
						</div>
					</div>
				
					<li><a class="menuitem">Comments Option</a>
						<ul class="submenu">
							<li><a href="comments.php">Show Comment</a></li>
						</ul>
					</li>
					
					<li><a class="menuitem">Category Option</a>
						<ul class="submenu">
							<li><a href="addcategory.php">Add Category</a></li>
							<li><a href="catlist.php">Category List</a></li>
						</ul>
					</li>
					<li><a class="menuitem">Post Option</a>
						<ul class="submenu">
							<li><a href="addpost.php">Add Post</a></li>
							<li><a href="postlist.php">Post List</a></li>
						</ul>
					</li>
					<li><a class="menuitem">Theme Option</a>
						<ul class="submenu">
							<li><a href="theme.php">Change Theme</a></li>
						</ul>
					</li>
					<li><a class="menuitem">Slider Option</a>
						<ul class="submenu">
							<li><a href="addslider.php">Add Slider</a></li>
							<li><a href="sliderlist.php">Slider List</a></li>
						</ul>
					</li>
				</ul>	
			</div>
		</aside>
		<article></article>

		