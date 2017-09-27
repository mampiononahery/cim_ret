<html>
<head>
<title>Galleryview 2.0 Example // appleton.me</title>
<script src="http://old.appleton.me/wp-content/themes/twentyten/js/jquery.js"></script>
<script src="http://old.appleton.me/wp-content/themes/twentyten/js/jquery.galleryview-2.0-pack.js"></script>
<script src="http://old.appleton.me/wp-content/themes/twentyten/js/jquery.timers-1.1.2.js"></script>
<script src="http://old.appleton.me/wp-content/themes/twentyten/js/jquery.easing.1.3.js"></script><!-- This is optional !-->
<link rel="stylesheet" href="http://old.appleton.me/wp-content/themes/twentyten/css/galleryview.css" type="text/css" />
<script>
	$(document).ready(function(){
		$('#gallery').galleryView({
			panel_width: 800,
			panel_height: 300,
			frame_width: 50,
			frame_height: 50,
      		transition_speed: 350,
     		 easing: 'easeInOutQuad',
			transition_interval: 0
		});
	});
</script>
</head>
<body>
<h1>Gallery View 2.0 Example Page</h1>
<p>This page provides an example of the markup required to implement version 2.0 of the jQuery "<a href="http://plugins.jquery.com/project/galleryview">Gallery View</a>" plugin.</p>
<p>The plugin was created by <a href="http://spaceforaname.com/">Jack Anderson</a>.</p>
<ul id="gallery">
    <li><img src="photos/beaute/apres/1_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/2_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/3_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/4_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/5_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/6_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/7_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/8_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/9_1.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/DSC_9783_01.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/ok_01.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/Original_01.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/scan_andry.jpg" height="100px" width="67px" /></li>	
        		<li><img src="photos/beaute/apres/visage.jpg" height="100px" width="67px" /></li>
</ul>
<p>Example provided by Andrew Appleton</p>
<p><a href="http://appleton.me/">&larr; Back to appleton.me</a></p>

</body>
</html>