<?php
include "connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add book</title>
</head>

<body>
<form method="POST" action="addbook.php" enctype="multipart/form-data">
<table width="700" align="center" border="1" bgcolor="green">
<tr align="center">
<td colspan="2"><h2> Insert new Book</h2></td>
</tr>
<tr>
<td align="right"><b> Book id</b></td>
<td><input type="number" name="Book_id" /> </td>
</tr>
<tr>
<td align="right"><b> Book title</b></td>
<td><input type="text" name="Book_title" /> </td>
</tr>
<tr>
<td align="right"><b> Book Category</b></td>
<td>
<select name="Categories">
<option disabled> Select a categories</option>
<option>Literature</option>
<option> Engineering</option>
<option>Music</option>
<option> Business</option>
<option> Games</option>
<option>Magazines</option>
</select>
 </td>
</tr>
<tr>
<td align="right"><b>Book image
</b></td>
<td><input type="file" name="Book_image" /> </td>
</tr>
<td align="right"><b>Bookfile
</b></td>
<td><input type="file" name="Book_file" /> </td>
</tr>
<td align="right"><b>Publisher Name
</b></td>
<td><input type="text" name="Publisher_name" /> </td>
</tr>


<tr>
<td align="right"><b> Book Price</b></td>
<td><input type="text" name="Book_price" /> </td>
</tr>
<tr>
<td align="right"><b> Book description</b></td>
<td><input type="text" name="Book_des" /> </td>
</tr>
<td align="right">
<td><input type="Submit" name="insert_book">
</td>
</tr>
</table>

</form>

</body>
</html>
<?php
if(isset($_POST['insert_book']))
{
	$count=0;
	$sql="select Book_id from books";
	$res=mysqli_query($db,$sql);
	while($row=mysqli_fetch_assoc($res))
	{
		if ($row['Book_id']==$_POST['Book_id']) {
			$count=$count+1;
		}
	}
if($count==0)
{
$Book_id=$_POST['Book_id'];
$Book_title = $_POST['Book_title'];
$Categories = $_POST['Categories'];
$Book_image = $_POST['Book_image'];
$image_dir=$_POST['image_dir'];
$Book_file = $_POST['Book_file'];
$Publisher_name=$_POST['Publisher_name'];
$Book_price = $_POST['Book_price'];
$Book_des = $_POST['Book_des'];
 $query ="INSERT INTO books (Book_id,Book_title,Categories,Book_image,image_dir,Book_file,Publisher_name,Book_price,Book_des) values ('$Book_id','$Book_title','$Categories','$Book_image','$image_dir','$Book_file','$Publisher_name','$Book_price','$Book_des')";
    $run_Book = mysqli_query($db,$query);
?>
 <script type="text/javascript">
 	alert("Book inserted succesfully");
 </script>
 <?php
}
else{
	?>
	<script type="text/javascript">
 	alert("Book_id already exist");
 </script>
 <?php
 }
}

?>