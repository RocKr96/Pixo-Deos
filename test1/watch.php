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
	<title>Watch</title>
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
			<table align=center>
			<tr><td><?php
			if(isset($_GET['status']) && $_GET['status']=='more')
			{
				$status="less";
				$var=7;
			}else{
				$status="more";
				$var=1;
			}
			if(isset($_GET['id']))
			{
				$id=$_GET['id'];
				$result=$con->query("SELECT * FROM `videos` WHERE id='$id'");
				if($row=$result->fetch_assoc())
				{
						$name=$row['name'];
						$url=$row['url'];	
						$views=$row['views'];
						$cat=$row['category'];
				}
				$cookie_name = $_SESSION['usr_id'];
				$cookie_value =$cat ;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
				echo "You Are watching...".$name."<br />";
				echo "<embed src='$url' width='978' height='550'/></embed>";				
				$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
				
				if(!isset($_GET['process']) && !($pageRefreshed == 1)){
				$views=$views+1;
				}
				?>	
				
				<div class="form-group">
							<label for="name">Views:<?php echo $views; ?></label>
				</div>
				<?php
				$con->query("UPDATE videos SET views=$views WHERE id=$id");
				$id=$_GET['id'];
					$result=$con->query("SELECT * FROM comment WHERE id=$id");
					?>		
					<ul>
						<?php while($row=$result->fetch_assoc()) : ?>
						<li><span><?php echo $row['time']?>-</span><strong><?php echo $row['usr']?></strong>: <?php echo $row['cmt']?></li>
						<?php endwhile; ?>
					</ul>
					<?php if(isset($_GET['error'])) :?>
					<div class='error' ><?php echo $_GET['error']; ?></div>
					<?php endif; ?>	

					<form action="process.php" method="post">
						<div class="form-group">
							<label for="name">Enter Comment:</label>
							<input type="text" name="comment" placeholder="Enter Comment Here.."/>
						</div>	
						<div class="form-group">
							<input type='hidden' name='id' value='<?php echo "$id";?>'/> 
							<input type="submit" name="submit" value="Comment" class="btn btn-primary" />
						</div>
					</form>
					<?php					
			}
			else
			{
				echo "Error!!";
			}
		?></td></tr>
			</table>	
			</ul>			
			&nbsp;<strong>Recommanded Videos:</strong>		<br><br>
	<div id="video">
		<?php
				$result=$con->query("SELECT * FROM `videos` WHERE category='$cat'");
			$cnt=1;
			echo "<table align='center'><tr>";
			while($row=$result->fetch_assoc())
			{
				$id=$row['id'];
				$name=$row['name'];	
				$own=$row['owner'];
				$cat=$row['category'];
				$url2="Thumbnail/$id.jpg";
					echo"<tr>";
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
				echo "</div></td>";
			?></div><?php
			if($cnt>$var){
				break;
			}
			$cnt++;
			}
			echo "<tr><td><a href='watch.php?id=$id&status=$status'>Show $status Videos...</a></td></tr></table>";
		?>
	
		</div>
		
	</div>	
	
</nav>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>





