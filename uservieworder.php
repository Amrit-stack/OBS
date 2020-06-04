<?php
$conn = mysqli_connect("localhost", "root", "", "online bookstore");
session_start();
if(!isset($_SESSION['username']))
{
	header('location:Adminpage.php');
   

}



?>

<!DOCTYPE html>
<html>
<head>
	<title>view order</title>
</head>
<link rel="viewport" content="width-device-width, initial scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body>
<nav class="navbar navbar-expand-sm bg-dark">
	<div class="container">

		
		
		<div class="srch">
      <form action="offvieworder.php" class="navbar-toggler-left" method="post" name="form1">
        
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
  </form>
		<a href="userpage.php" class="navbar-brand text-warning font-weight-bold">Back</a>
</div>
</nav>
<table class="table table-dark">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Bookid</th>
		<th>Ordered Quantity</th>
		<th>Email</th>
		<th>Mobile Number</th>
		
	</tr>
	
	<?php
$conn = mysqli_connect("localhost", "root", "", "online bookstore");
// Check connection
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT *FROM offlinepay where first='".$_SESSION['username']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
// output data of each row
while($row = $result->fetch_assoc()) 
{
	echo"
<tr>
<td>{$row["first"]}</td>

<td>{$row["last"]}</td>
<td>{$row["address"]}</td>
<td>{$row["Book_id"]}</td>
<td>{$row["ordered_quantity"]}</td>
<td>{$row["email"]}</td>
<td>{$row["mobilenumber"]}</td>
<td><a href='deletecust1.php?Book_id={$row["Book_id"]}' class='btn btn-danger'>Delete</a> </td>


</tr>
";


}
echo "</table>";
} 
else { 
	echo "0 results"; 
}
$conn->close();
?>

</table>

</body>
</html>

