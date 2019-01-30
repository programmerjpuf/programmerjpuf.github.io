<section class="contentsection clear">
	<div class="leftsidebar clear">
		
		<div class="w3-container">
			<button onclick="myFunction('user')" id="btn1" class="w3-btn w3-left-align">User Option</button>
			<div id="user" class="w3-hide" style="list-style-type:none">
				<?php if(Session::get('userRole') == '1'){ ?>
				<li><a href="adduser.php" class="w3-btn">Add User</a></li>
				<?php } ?>
				<li><a href="profile.php" class="w3-btn">Update User Profile</a></li>
				<li><a href="userlist.php" class="w3-btn">User List</a></li>
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

		<div class="btn1">
		<div class="w3-container">
			<button onclick="myFunction('social')" id="btn1" class="w3-btn w3-left-align">Social Option</button>
			<div id="social" class="w3-hide" style="list-style-type:none">
				<li><a href="social.php" class="w3-btn">Social Option</a></li>
				<li><a href="titleslogan.php" class="w3-btn">Title & Slogan</a></li>
				<li><a href="copyright.php" class="w3-btn">Copyright Option</a></li>
			</div>
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
		
		<div class="btn1">
		<div class="w3-container">
			<button onclick="myFunction('page')" id="btn1" class="w3-btn w3-left-align">Page Option</button>
			<div id="page" class="w3-hide" style="list-style-type:none">
				<li><a href="addpage.php" class="w3-btn">Create New Page</a></li>
					<?php 
						$query = "select * from tbl_page";
						$page  = $db->select($query);
							if($page){
							while($result = $page->fetch_assoc()){
					?>
				<li><a href="page.php?pageid=<?php echo $result['id'];?>" class="w3-btn"><?php echo $result['name'];?></a></li>
					<?php } }?>
			</div>
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
			
		<div class="btn1">
		<div class="w3-container">
			<button onclick="myFunction('site')" id="btn1" class="w3-btn w3-left-align">Site Option</button>
			<div id="site" class="w3-hide" style="list-style-type:none">
				<li><a href="bgchange.php" class="w3-btn">Change Site Background</a></li>
				<li><a href="fontchange.php" class="w3-btn">Change Site Fonts</a></li>
			</div>
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
			
		<div class="btn1">
		<div class="w3-container">
			<button onclick="myFunction('comments')" id="btn1" class="w3-btn w3-left-align">Comments Option</button>
			<div id="comments" class="w3-hide" style="list-style-type:none">
				<li><a href="comments.php" class="w3-btn">Show Comment</a></li>
			</div>
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
			
		<div class="btn1">
		<div class="w3-container">
			<button onclick="myFunction('category')" id="btn1" class="w3-btn w3-left-align">Category Option</button>
			<div id="category" class="w3-hide" style="list-style-type:none">
				<li><a href="addcategory.php" class="w3-btn">Add Category</a></li>
				<li><a href="catlist.php" class="w3-btn">Category List</a></li>
			</div>
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
			
		<div class="btn1">
		<div class="w3-container">
			<button onclick="myFunction('post')" id="btn1" class="w3-btn w3-left-align">Post Option</button>
			<div id="post" class="w3-hide" style="list-style-type:none">
				<li><a href="addpost.php" class="w3-btn">Add Post</a></li>
				<li><a href="postlist.php" class="w3-btn">Post List</a></li>
			</div>
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
			
		<div class="btn1">
		<div class="w3-container">
			<button onclick="myFunction('theme')" id="btn1" class="w3-btn w3-left-align">Theme Option</button>
			<div id="theme" class="w3-hide" style="list-style-type:none">
				<li><a href="theme.php" class="w3-btn">Change Theme</a></li>
			</div>
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
			
		<div class="pbtn">
		<div class="w3-container">
			<button onclick="myFunction('slider')" id="btn1" class="w3-btn w3-left-align">Slider Option</button>
			<div id="slider" class="w3-hide" style="list-style-type:none">
				<li><a href="addslider.php" class="w3-btn">Add Slider</a></li>
				<li><a href="sliderlist.php" class="w3-btn">Slider List</a></li>
			</div>
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
		
		<div class="pbtn">
		<div class="w3-container">
			<button onclick="myFunction('pass')" id="btn1" class="w3-btn w3-left-align">Password Option</button>
			<div id="pass" class="w3-hide" style="list-style-type:none">
				<li><a href="changepass.php" class="w3-btn">Change Password</a></li>
			</div>
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
	</div>


		