<!DOCTYPE html>
<html>
<head>
<title>Basic Website</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="font-awesome-4.5.0/css/fontawesome.min.css">
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:2200,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>

</head>
<body>
	<div class="headersection templet clear">
	<a href="index.php">
	<div class="logo clear">
		<img src="images/muhit10.jpg" alt="logo"/>
		<h2>Website Title<h2/>
		<p>This is Muhit's website<p/>
	</div>
	<div class="social clear">
		<a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
		<a href="http://www.twitter.com"><i class="fab fa-twitter"></i></a>
		<a href="http://www.instagram.com"><i class="fab fa-instagram"></i></a>
		<a href="https://plus.google.com"><i class="fab fa-google-plus-g"></i></a>
		<a href="https://google.com"><i class="fab fa-google"></i></a>
		<a href="http://www.yahoo.com.com"><i class="fab fa-yahoo"></i><a/>
		<a href="http://www.youtube.com"><i class="fab fa-youtube-square"></i></a>
	</div>
	</div>
	
	<div class="navsection templet">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="gallery.php">Gallery</a>
				<ul>
					<li><a href="#">Photo</a></li>
				</ul>
			</li>
			<li><a href="video.php">Video</a></li>
			<li><a id="active" href="webmail.php">Webmail</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</div>