
<?php
include"connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>view details</title>
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

		
		
		
		</form>
		<a href="Adminpage.php" class="navbar-brand text-warning font-weight-bold">Back</a>
</div>
</nav>
<table class="table table-hover">
	<tr>
		<th>Book_id</th>
		<th>Book_title</th>
		<th>Book_quantity</th>
		<th>Categories</th>
		<th>Book_image</th>
		<th>seller_name</th>
		<th>Contact_number</th>
		<th>Book_price</th>
		<th>Book_des</th>
	</tr>
	
	<?php
// Check connection
if ($db->connect_error) 
{
die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT *FROM books";
$result = $db->query($sql);
if ($result->num_rows > 0) 
{
// output data of each row
while($row = $result->fetch_assoc()) 
{
	echo"
<tr>

<td>{$row['Book_id']}</td>

<td>{$row['Book_title']}</td>
<td>{$row['Book_quantity']}</td>
<td>{$row['Categories']}</td>"
?>
<td><img src="<?php echo $row['Book_image'];?>" width=20% height=10% ></td>
<?php
echo "
<td>{$row['Publisher_name']}</td>
<td>{$row['contact_number']}</td>
<td>{$row['Book_price']}</td>
<td>{$row['Book_des']}</td>
<td><a href='bookupdate.php?Book_id=$row[Book_id]&Book_title=$row[Book_title]&Book_quantity=$row[Book_quantity]&Categories=$row[Categories]&Publisher_name=$row[Publisher_name]&contact_number=$row[contact_number]&Book_price=$row[Book_price]&Book_des=$row[Book_des]'>Update</a></td>
<td><a href='deletesell.php?Book_id={$row["Book_id"]}' class='btn btn-danger'>Delete</a> </td>
</tr>"
;
}
echo "</table>";
} 
else { 
	echo "0 results"; 
}
$db->close();
?>

</table>

</body>
</html>

