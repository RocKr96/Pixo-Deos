<?php
	session_start();
	include 'database.php';
	mysqli_select_db($con,"test");
	if(isset($_POST['submit'])) {
		$id=$_POST['id'];
		$user=$_SESSION['usr_name'];
		$comment= mysqli_real_escape_string($con,$_POST['comment']);		
		date_default_timezone_set('Asia/Kolkata');
		$time= date('Y-m-d h:i:sa',time());
		
		if(!isset($comment) || $comment == ""){
			$error ="Please fill in a Comment..";
			header("Location:watch.php?process=true&error=".urlencode($error));
			exit();
		}else{
			$query= "INSERT INTO `comment` (id,usr,cmt,time) VALUES ('$id','$user','$comment','$time')";
			
			if(!mysqli_query($con,$query)){
				die('Error: '.mysqli_error($con));
			}else{
				header("Location:watch.php?id=$id&process=true");
				exit();
			}
		}		
	}
?>