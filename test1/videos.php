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
	<title>Videos</title>
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
<div id="video">
	<?php
		$i=1;
		
		if(isset($_GET['query'])){
			$search = $_GET['query'];
			$result = $con->query("SELECT * FROM videos WHERE name LIKE '%".$search."%'");
		}
		else{
			$cat=$_GET['cat'];
			$result=$con->query("SELECT * FROM `videos` WHERE category='$cat'");
		}
		?><table><?php
		if($row=$result->fetch_assoc()){
			if(isset($_GET['query'])){	
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$rowcount=mysqli_num_rows($result);
				echo "<tr><td>&nbsp;</td>Tatal $rowcount results found...<td>&nbsp;</td></tr>";
			}
			do
			{				
				$id=$row['id'];
				$name=$row['name'];	
				$own=$row['owner'];
				$cat=$row['category'];
				$url2="Thumbnail/$id.jpg";
				?><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td ><?php echo $i.".\t";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td ><img src="<?php echo $url2; ?>" height = "100" width="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td><td><?php
				$i++;
				echo "<a href='watch.php?id=$id'>$name</a><br />";
				echo "Uploaded By:$own<br />";
				echo "Category:$cat<br>";?></td></tr><tr><td>&nbsp;</td></tr><?php
			}while($row=$result->fetch_assoc());
		}else{
				echo "Sorry...Videos Not Available";
		}
	?>
	</table>
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