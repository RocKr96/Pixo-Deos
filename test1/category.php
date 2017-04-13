<?php
	session_start();
	include 'database.php';
	mysqli_select_db($con,"test");
	if(!isset($_SESSION['usr_id'])) {
	header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
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
				<form action="videos.php" method="get">
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="query" placeholder="Search videos here..">
						<button type="submit">Search</button>
				</form>
			</ul>
		</div>
	</div>			
</nav>	
				&nbsp;
	<div id="category">
		<?php
				$category = array("Education", "News", "Entertainment", "Music","Funny", "Sports", "Nature", "Other");
			$cnt=1;
			$z=1;
			echo "<table align='center'><tr><td>&nbsp;</td></tr><tr>";
			foreach ($category as $cat) {
				$url2="category/$cat.jpg";
				if($z==5)
					echo"<tr>";
			echo "<td><div class='gallery'>";
				echo "<a href='videos.php?cat=$cat'>";
				//echo $i.".\t";
				?><img src="<?php echo $url2; ?>" height = "67.5" width="90">
				<?php
				echo "</a>";
				echo "<div class='desc'>";
				echo "<strong>$cat</strong></div>";
				echo "</div></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				$z++;
				if($z==5)
				{
					echo"</tr>";
					echo "<tr><td>&nbsp;</td></tr>";
					$z=1;
				}
			?></div><?php
			if($cnt>7){
				break;
			}
			$cnt++;
			}
			echo "</table>";
		?>
		</div>
	</div>
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