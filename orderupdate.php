<?php
include "connection.php";
error_reporting(0);
$_GET['first'];
 $_GET['last'];
 $_GET['address'];
 $_GET['Book_id'];
 $_GET['ordered_quantity'];
  $_GET['sold_quantity']; 
 $_GET['email'];
 $_GET['mobilenumber'];
 $_GET['order_date'];
 $_GET['sold_date'];
  $_GET['status'];
 ?>
 <!DOCTYPE html>
<html>
<head>
  <title>Update order</title>
  
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device width,initial width,initial scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style type="text/css">
  section{
    margin: -20px;
    height: 1000px;
  }
  .box2{
height: 1000px;


  }
</style>
</head>
<body>
  <section>
  <div class="reg_image">
    <br> 
    <div class="box2">
      <h1 style="text-align: center;font-size: 35px;font-family: Lucida Console">Online Bookstore</h1><br>
      <h1 style="text-align: center;font-size: 25px;font-family: Lucida Console">Update Order</h1><br>
      <form name="registration" action="" method="">
        <br><br>
  
  <div class="login">
          <input class="form-control" type="text" name="first" value="<?php echo $_GET['first'];  ?>"><br>
          <input class="form-control" type="text" name="last" value="<?php echo $_GET['last'];  ?>"> <br>
        <input class="form-control" type="text" name="address" value="<?php echo $_GET['address'];  ?>"><br>
        <input class="form-control" type="number" name="Book_id" value="<?php echo $_GET['Book_id'];  ?>"><br>
        <label>Available books</label><br>
        <input class="form-control" type="number" name="Book_quantity" value="<?php echo $_GET['Book_quantity']; ?>"><br>
        <label>Ordered quantity</label><br>
        <input class="form-control" type="number" name="ordered_quantity" value="<?php echo $_GET['ordered_quantity'];  ?>"><br>
         <label>sold quantity</label><br>
        <input class="form-control" type="number" name="sold_quantity" value="<?php echo $_GET['sold_quantity'];  ?>"><br>
        <input class="form-control" type="" name="email" value="<?php echo $_GET['email'];  ?>"><br>
        <input class="form-control" type="number" name="mobilenumber" value="<?php echo $_GET['mobilenumber'];  ?>"><br>
        <label>Order date</label><br>
        <input class="form-control" type="date" name="order_date"  value="<?php echo $_GET['order_date'];?>"><br>
        <label>Sold date</label><br>
        <input class="form-control" type="date" name="sold_date"value="<?php echo date("Y-m-d"); ?>">
        <br>
           <label>Status</label><br>
         <select class="form-control" type="text" name="status" value="<?php echo $_GET['status'];  ?>">
          <option>Sold</option>
          <option>Unsold</option>

</select>

          <br>
         <input class="form-control" type="submit" name="submit"value="submit">
        
      </p>
<a href="offvieworder.php">BACK</a>
        
      </form>
      
    </div>
    </div>

      </section>
</body>
</html>

<?php 
if ($_GET['submit']) 
{
$first=$_GET['first'];
$last=$_GET['last'];
$address=$_GET['address'];
$bookid=$_GET['Book_id'];
$Book_quantity=$_GET['Book_quantity'];
$ordered_quantity=$_GET['ordered_quantity'];
$sold_quantity=$_GET['sold_quantity'];
$email=$_GET['email'];
$mobilenumber=$_GET['mobilenumber'];
$order_date=$_GET['order_date'];
$sold_date=$_GET['sold_date'];
$status=$_GET['status'];

if ($_GET['ordered_quantity']>$_GET['Book_quantity']) 
{
  echo "Error! ordered quantity greater than available quantity";
}

elseif ($_GET['sold_quantity']>$_GET['ordered_quantity']) 
{
  echo "Error! Sold quantity greater than ordered quantity";
}
else{
	$query="UPDATE offlinepay SET first='$first',last='$last',address='$address',Book_id='$bookid',Book_quantity='$Book_quantity',ordered_quantity='$ordered_quantity',sold_quantity='$sold_quantity',email='$email',mobilenumber='$mobilenumber',order_date='$order_date',sold_date='$sold_date',status='$status' WHERE Book_id='$bookid'";
	$result= mysqli_query($db,$query);
	if ($result) 
  {
		echo "Updated successfully.<a href='offvieworder.php'>Check Updated list here</a>";
	}
	else
		echo "Not updated";
}
}
 ?>
