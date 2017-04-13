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
	<title>Home</title>
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
&nbsp;<strong><h3>Most Views:</h3></strong><br><br>
<div id="video">
	<?php
		$result=$con->query("SELECT * FROM `videos` order by views DESC");
		$cnt=1;
		$z=1;
		echo "<table align='center'><tr>";
		while($row=$result->fetch_assoc())
		{
			$id=$row['id'];
			$name=$row['name'];	
			$own=$row['owner'];
			$cat=$row['category'];
			$url2="Thumbnail/$id.jpg";
			if($z==5)
				echo"<tr>";
			echo "<td><div class='gallery'>";
			echo "<a href='watch.php?id=$id'>";
			?><img src="<?php echo $url2; ?>" height = "67.5" width="90">
			<?php
			echo "</a>";
			echo "<div class='desc'>";
			echo "<a href='watch.php?id=$id'>$name</a><br />";
			echo "Uploaded By:$own<br />";
			echo "Category:$cat<br></div>";
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
	&nbsp;<strong><h3>Recommanded Videos:</h3></strong><br><br>
	<div id="video">
	<?php
		$cookie_name = $_SESSION['usr_id'];
		if(!isset($_COOKIE["$cookie_name"])){
			$result=$con->query("SELECT * FROM `videos`");
		//	echo "Cookie not set..!";
		}else{
			$cat=$_COOKIE[$cookie_name];
		//	echo "Value is: " . $_COOKIE[$cookie_name];
		//	echo $cat;
		//	echo "Cookie is set..!";
			$result=$con->query("SELECT * FROM `videos` WHERE category='$cat'");
		}
		$cnt=1;
		echo "<table align='center'><tr>";
		while($row=$result->fetch_assoc())
		{
			$id=$row['id'];
			$name=$row['name'];	
			$own=$row['owner'];
			$cat=$row['category'];
			$url2="Thumbnail/$id.jpg";
		echo "<td><div class='gallery'>";
			echo "<a href='watch.php?id=$id'>";
			//echo $i.".\t";
			?><img src="<?php echo $url2; ?>" height = "67.5" width="90">
			<?php
			echo "</a>";
			echo "<div class='desc'>";
			echo "<a href='watch.php?id=$id'>$name</a><br />";
			echo "Uploaded By:$own<br />";
			echo "Category:$cat<br></div>";
			echo "</div></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		?></div><?php
		if($cnt>3){
			break;
		}
		$cnt++;
		}
		echo "</tr></table>";
	?>	
	
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





