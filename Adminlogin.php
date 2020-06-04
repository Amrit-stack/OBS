<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<style>
	a{
		position: absolute;
top: 0;
right: 0;
	}
</style>
<style type="text/css">
	#ab1:hover{cursor: pointer;


	}
</style>

<body>
<div class="container-fluid" style="width: 400px;margin-top: 50px;">
	<div class="card">
		<img src="bookstore.jpg" class="card-image-top">
		<div class="card-body">
	<form class="form-group" action="" method="POST">
		<label>username:</label><br>
		<input type="text" name="username" class="form-control" placeholder="enter username"><br>
		<label>password:</label><br>
		<input type="password" name="password" class="form-control" placeholder="enter password"><br>
		<input type="submit" name="login_submit" id="ab1" class="btn btn-primary">
	</form>
</div>
	</div>
</div>













 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<h3><a href="homepage.php">Back</a></h3>
</body>
</html>

<?php 
include "connection.php";
session_start();
if (isset($_POST['login_submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from adminlogin where username='$username' and password='$password'";
	$result=mysqli_query($db,$query);
	$row=mysqli_num_rows($result);
	if ($row == 1) {
		 echo "login successful";
		 $_SESSION['username']=$username;

		header("Location:Adminpage.php");
	}
	else
	{
		echo"<center><b>Invalid username and password,Please try again!</b></center>";
			}
	
}
?>
<style type="text/css">
	body{
background-image:url('background.jpg');

	}
</style>