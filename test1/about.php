<?php
	session_start();
	if(!isset($_SESSION['usr_id'])) {
	header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/footer.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="home.php">Pixa'Deos</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="home.php">Home</a></li>
				<li><a href="category.php">Videos</a></li>
				<li><a href="upload.php">Upload</a></li>
				<li><a href="about.php">About Us</a></li>
				<form action="results.php" method="get">
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="query" placeholder="Search videos here..">
						<button type="submit">Search</button>
					</form>
			</ul>
		</div>
	</div>			
</nav>
<table align="center">
<tr>
<td></td><td></td><td><h1><strong>About Us</strong></h1><br></td></tr><td><img src="a.jpg" style='width:400px;height:380px;' ></td><td></td><td><p><pre>
Pixa'Deos was established in 2017 on Wellington's Tinakori Road (as Tinakori Gallery). 
Initially focusing on historical artworks, Marcia Page quickly established the Gallery as an 
authority in this field. Over the course of the first thirteen years, the Gallery's focus 
became increasingly contemporary. This transition was reinforced by the relocation to a larger 
and more central space on Featherston Street in Wellington's CBD.

By 2006, as Wellington's central business district developed, the decision was made to relocate
again - to Victoria Street, opposite Wellington's City Gallery. With over 350m2, including three
independent exhibiting spaces, extensive storage and private viewing areas, Pixa'Deos
is the now most significant commercial art space in Wellington.

In December 2007 the business began trading as Pixa'Deos, when James Blackie joined 
Marcia Page as co-Director, coinciding with the Gallery's 20th anniversary celebrations.

Pixa'Deos represents twenty of the country's finest contemporary art practitioners
and is a leading presence in the New Zealand art scene, as demonstrated by regular attendance
at national and international art fairs.Based on Marcia Page's wisdom and experience, Artista
Art Gallery remains one of the country's leading galleries for resale of historical artworks,
including C.F. Goldie, Colin McCahon, Frances Hodgkins, to name a few, as well as providing 
valuation services for both historical and contemporary collections.</pre></p></td>
</tr>		
</table>
		<footer class="footer-distributed">

			<div class="footer-left">

				<p class="footer-links">
					<a href="home.php">Home</a>
					·
					<a href="category.php">Videos</a>
					·
					<a href="upload.php">Upload</a>
					·
					<a href="about.php">About Us</a>
				</p>

				<p>Pixa'Deos &copy; 2017</p>
			</div>

		</footer>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
