<?php
	session_start();
	include 'database.php';
	mysqli_select_db($con,"test");
	$result=$con->query("SELECT * FROM comment WHERE id=$id");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | Koding Made Simple</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Koding Made Simple</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="home.php">Home</a></li>
				<li><a href="videos.php">Videos</a></li>
				<li><a href="about.php">About Us</a></li>
			</ul>
		</div>
	</div>			
</nav>

		
		<div class="col-md-4 col-md-offset-1 well">
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
				<input type="submit" name="submit" value="Comment" class="btn btn-primary" />
			</div>
			
			</form>
		</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>






	