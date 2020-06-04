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
<td align="right"><b>Book id</b></td>
<td><input type="number" name="Book_id" placeholder="Insert unique id"required /> </td>
</tr>
<tr>
<td align="right"><b> Book title</b></td>
<td><input type="text" name="Book_title" required /> </td>
</tr>
<td align="right"><b> Book Quantity</b></td>
<td><input type="number" min="1" name="Book_quantity" required /> </td>
</tr>
<tr>
<td align="right"><b> Book Category</b></td>
<td>
<input type="text" name="Categories" required>
 </td>
</tr>
<tr>
<td align="right"><b>Book image
</b></td>
<td><input type="file" name="Book_image" id="img_div" required/> </td>
</tr>
<td align="right"><b>Seller Name
</b></td>
 <td> <input type="text" name="Publisher_name" required></td>
</tr>

<td align="right"><b>Contact_number
</b></td>
<td><input type="number" name="contact_number" required/> </td>
</tr>

<tr>
<td align="right"><b> Book Price</b></td>
<td><input type="number" min="1" name="Book_price" required/> </td>
</tr>
<tr>
<td align="right"><b> Book description</b></td>
<td><input type="text" name="Book_des" required/> </td>
</tr>
<td align="right">
<td><input type="Submit" name="insert_book">
</td>
<td align="right">
<td><button type="reset" name="reset">Reset</button>
</td>

</tr>
</table>
<a href="userpage.php">Back</a>
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
		if ($row['Book_id']==$_POST['Book_id'])
		 {
			$count=$count+1;
		}

	}
if($count==0)
{
$Book_id=$_POST['Book_id'];
$Book_title = $_POST['Book_title'];
$Book_quantity = $_POST['Book_quantity'];
$Categories = $_POST['Categories'];


$tm=md5(time());
	$Book_image=$_FILES['Book_image']['name'];
	$dst='./books/'.$tm.$Book_image;
	$dst1='books/'.$tm.$Book_image;
	move_uploaded_file($_FILES['Book_image']['tmp_name'], $dst);


$Publisher_name=$_POST['Publisher_name'];
$Con_num=$_POST['contact_number'];
$Book_price = $_POST['Book_price'];
$Book_des = $_POST['Book_des'];
if(strlen($Con_num)!=10)
echo "Mobile number should be of 10 digit";
else{
 $query ="INSERT INTO books (Book_id,Book_title,Book_quantity,Categories,Book_image,Publisher_name,contact_number,Book_price,Book_des) values ('$Book_id','$Book_title','$Book_quantity','$Categories','$dst1','$Publisher_name','$Con_num','$Book_price','$Book_des')";
    $run_Book = mysqli_query($db,$query);
?>
 <script type="text/javascript">
 	alert("Book inserted succesfully");
 </script>
 <?php
}
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