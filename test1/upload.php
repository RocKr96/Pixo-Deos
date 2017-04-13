<?php
	session_start();
	include 'database.php';
	mysqli_select_db($con,"test");
	$error="";
	if(!isset($_SESSION['usr_id'])) {
	header("Location: index.php");
	}	
	if(isset($_POST['submit'])){
		$videoFile = $_FILES["file"]["tmp_name"];
		if(($_POST['category'] != 'select') && ($videoFile != "")) {
			$category = $_POST['category'];
			$user=$_SESSION['usr_name'];
			$ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg.exe";
			
			$name = $_FILES['file']['name'];
		//	echo $videoFile;
			$imageFile = "a.jpg";
		//	echo $imageFile;
			$size = "1020x765";
			$getFromSecond = 1;
			$cmd = "$ffmpeg -i $videoFile -an -ss $getFromSecond -s $size Thumbnail/$imageFile";
		//	echo $cmd;
			if(!shell_exec($cmd)){
		//		echo "Successfully";
			}
			else{
				echo "fail...";
			}
		
			$name = $_FILES['file']['name'];
			$temp = $_FILES['file']['tmp_name'];
			move_uploaded_file($temp,"uploaded/".$name);
			$url="http://localhost/test/uploaded/$name";
			$con->query("INSERT INTO `videos` VALUE ('','$name','$url','','','$category','$user')");
			
			$result=$con->query("SELECT * FROM `videos` WHERE name='$name'");
			if($row=$result->fetch_assoc())
			{
					$id=$row['id'];					
			}
			//echo $id;
			rename("Thumbnail/a.jpg","Thumbnail/$id.jpg");
			$url1="http://localhost/test/Thumbnail/$id";
			$con->query("UPDATE videos SET image='$url1' WHERE id=$id");

		} else {
		  $error= "Please select valid value from dropdown list or Choose Video File...";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
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


<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
			<form action="upload.php" method="POST" enctype="multipart/form-data">
				<li><input type="file" name="file" /></li>
				<p>Category:<br/><select name="category">
					<option value="select">select</option>
					<option value="education">Education</option>
					<option value="news">News</option>
					<option value="entertainment">Entertainment</option>
					<option value="music">Music</option>
					<option value="funny">Funny</option>
					<option value="sports">Sports</option>
					<option value="nature">Nature</option>
					<option value="other">Others</option>
				</select></p>
				<p><li><input type="submit" name="submit" value="Upload!!" /></li>
				<li class="text-danger"><?php echo $error; ?></li>
				
			</form>
			</ul>
		</div>
	</div>			
</nav>
<table>
<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
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





