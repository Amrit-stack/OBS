<?php
include "connection.php"; 

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>New user registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device width,initial width,initial scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style type="text/css">
	section{
		margin: -20px;
		height: 600px;
	}
</style>

</head>

<body>
<section>

	<div class="reg_image">
		<br> 
		<div class="box2">
			<h1 style="text-align: center;font-size: 35px;font-family: Lucida Console">Online Bookstore</h1><br>
			<h1 style="text-align: center;font-size: 25px;font-family: Lucida Console">Customer registration form</h1><br>
			<form name="registration" action="" method="POST">
				<br><br>
				<div class="login">
					<input class="form-control" type="text" name="first" placeholder="first name" required=""><br>
					<input class="form-control" type="text" name="last" placeholder="last name" required=""><br>
				<input class="form-control" type="text" name="username" placeholder="username" required=""><br>
				<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
				<input class="form-control" type="text" name="email" placeholder="E-mail" required=""><br>
				<input class="form-control" type="text" name="mobilenumber" placeholder="Mobilenumber" required=""><br>
				<input class="btn btn-primary" type="submit" name="submit" value="Sign Up" style="height: 40px;" width="20px;"></div>
				<p style="color: white; padding-left: 20px; height: 10px;">
				<a style="color:white" style="line-height: 20px" href="userlogin.php">
				Already a member? Login</a>
				
			</p>

				
			</form>
			
		</div>
		

	</div>
	
		
	

</section>
<a href="homepage.php"><h2>Home</h2></a>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
	$count=0;
	$sql="select username from student";
	$res=mysqli_query($db,$sql);
	while($row=mysqli_fetch_assoc($res))
	{
		if ($row['username']==$_POST['username']) {
			$count=$count+1;
		}
	}

if($count==0)
{
$s_name=$_POST['first'];
$s_last=$_POST['last'];
$s_username=$_POST['username'];
$s_password=$_POST['password'];
$s_email=$_POST['email'];
$s_mobilenumber=$_POST['mobilenumber'];
if (!preg_match("/^[a-zA-Z ]*$/",$s_name))
echo "Only letters and white space allowed in the first name";

if (!preg_match("/^[a-zA-Z ]*$/",$s_last))
echo "Only letters and white space allowed in the last name ";

$alphabet = preg_match('@[a-zA-Z]@', $s_password);
$number    = preg_match('@[0-9]@', $s_password);

if(!$number || !$alphabet ||strlen($s_password) < 8)
    echo "Password should be at least 8 characters in length and should include at least one number and one alphabet.";
else if(strlen($s_mobilenumber)!=10)
echo "Mobile number should be of 10 digit";
 else
 {
$insert_student="insert into user(first,last,username,password,email,mobilenumber) values('$s_name','$s_last','$s_username','$s_password','$s_email','$s_mobilenumber')";
 
 $run_student = mysqli_query($db,$insert_student);
 ?>
 <script type="text/javascript">
 	alert("Registration succesful");
 	window.open("userlogin.php");
 </script>
 <?php 
}
}


else{
	?>
	<script type="text/javascript">
 	alert("username already exist");
 </script>
 <?php 
}
}
 ?>
 