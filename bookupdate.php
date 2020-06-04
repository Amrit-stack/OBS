<?php
include "connection.php";
error_reporting(0);
$_GET['Book_id'];
 $_GET['Book_title'];
 $_GET['Book_quantity'];
 $_GET['Categories'];
 $_GET['Publisher_name'];
  $_GET['contact_number']; 
 $_GET['Book_price'];
 $_GET['Book_des'];

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

    height: 800px;
  }
  
</style>
</head>
<body>
  <section>
  <div class="reg_image">
    <br> 
    <div class="box2">
      <h1 style="text-align: center;font-size: 35px;font-family: Lucida Console">Online Bookstore</h1><br>
      <h1 style="text-align: center;font-size: 25px;font-family: Lucida Console">Update Books</h1><br>
      <form name="registration" action="" method="">
        <br><br>
  
  <div class="login">
          <input class="form-control" type="number" name="Book_id" value="<?php echo $_GET['Book_id'];  ?>"><br>
          <input class="form-control" type="text" name="Book_title" value="<?php echo $_GET['Book_title'];  ?>"> <br>
          <label>Available book quantity</label><br>
        <input class="form-control" type="number" name="Book_quantity" value="<?php echo $_GET['Book_quantity'];  ?>"><br>
        <input class="form-control" type="text" name="Categories" value="<?php echo $_GET['Categories'];  ?>"><br>
    
        <input class="form-control" type="text" name="Publisher_name" value="<?php echo $_GET['Publisher_name'];  ?>"><br>
       
        <input class="form-control" type="number" name="contact_number" value="<?php echo $_GET['contact_number'];  ?>"><br>
        <input class="form-control" type="number" name="Book_price" value="<?php echo $_GET['Book_price'];  ?>"><br>
        <input class="form-control" type="text" name="Book_des" value="<?php echo $_GET['Book_des'];  ?>"><br>
          <br>
         <input class="form-control" type="submit" name="submit"value="submit">
        <a href="sellview.php">Back</a>
      </p>

        
      </form>
      
    </div>
    </div>
      </section>
</body>
</html>

<?php 
if ($_GET['submit']) 
{
$Book_id=$_GET['Book_id'];
$Book_title = $_GET['Book_title'];
$Book_quantity = $_GET['Book_quantity'];
$Categories = $_GET['Categories'];
$Publisher_name=$_GET['Publisher_name'];
$Con_num=$_GET['contact_number'];
$Book_price = $_GET['Book_price'];
$Book_des = $_GET['Book_des'];
	$query="UPDATE books SET Book_id='$Book_id',Book_title='$Book_title',Book_quantity='$Book_quantity',Categories='$Categories',Publisher_name='$Publisher_name',contact_number='$Con_num',Book_price='$Book_price',Book_des='$Book_des'WHERE Book_id='$Book_id'";
	$result= mysqli_query($db,$query);
	if ($result) 
  {
		echo "Updated successfully.<a href='sellview.php'>Check Updated list here</a>";
	}
	else
		echo "Not updated";
}

 ?>
