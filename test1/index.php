<?php
session_start();
session_unset();
include_once 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Pixa'Deos</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				
			</ul>
		</div>
	</div>
</nav>
	<div class="slideshow-container">

<div class="mySlides fade">
<center><img src="a.jpg" style="width:1350px;height:600px;"></center>  
</div>

<div class="mySlides fade">
<center><img src="2.jpg" style="width:1350px;height:600px;"></center></div>

<div class="mySlides fade">
<center><img src="3.jpg" style="width:1350px;height:600px;"></center>
</div>

<div class="mySlides fade">
<center><img src="4.jpg" style="width:1350px;height:600px;"></center>
</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <br>
</div>

	<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

