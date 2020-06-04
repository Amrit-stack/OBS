<?php
include "connection.php"; 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order</title>
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
  .box2{
height: 700px;

  }
</style>

</head>

<body>
<section>

  <div class="reg_image">
    <br> 
    <div class="box2">
      <h1 style="text-align: center;font-size: 35px;font-family: Lucida Console">Online Bookstore</h1><br>
      <h1 style="text-align: center;font-size: 25px;font-family: Lucida Console">Order details</h1><br>
      <form name="order" action="" method="POST">
        <br><br>
        <div class="login">
          <input class="form-control" type="text" name="first" placeholder="first name" required=""><br>
          <input class="form-control" type="text" name="last" placeholder="last name" required=""><br>
        <input class="form-control" type="text" name="address" placeholder="address" required=""><br>
        <input class="form-control" type="number" name="Book_id" placeholder="Book_id" required="" ><br>
        <input class="form-control" type="number" min="1"  name="ordered_quantity" placeholder="required quantity"required=""><br>
        <input class="form-control" type="email" name="email" placeholder="E-mail" required=""><br>
        <input class="form-control" type="number" name="mobilenumber" placeholder="Mobilenumber" required=""><br>
        <input class="form-control" type="date" name="order_date" value="<?php echo date("Y-m-d"); ?>" required=""><br>
        <input class="btn btn-primary" type="submit" name="submit" value="Order" style="height: 40px;" width="20px;"></div>

        
        
      </p>

        
      </form>
      
    </div>
    

  </div>
  
    
  

</section>
<a href="vieworder1.php"><h2>Back</h2></a>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
  $sql="SELECT * 
FROM offlinepay o
INNER JOIN books b
ON o.Book_id = b.Book_id;";
  $res=mysqli_query($db,$sql);


 $sql1="SELECT Book_quantity 
FROM books b
INNER JOIN offlinepay o
ON b.Book_id = o.Book_id;";
$res1=mysqli_query($db,$sql1);


$s_first=$_POST['first'];
$s_last=$_POST['last'];
$s_address=$_POST['address'];
$s_bookid=$_POST['Book_id'];
$qty=$_POST['ordered_quantity'];
$s_email=$_POST['email'];
$s_mobilenumber=$_POST['mobilenumber'];
$order_date=$_POST['order_date'];
if ($_POST['ordered_quantity']>$sql1)
 {
  echo"Ordered quantity greater than available quantity";
  }
if (!preg_match("/^[a-zA-Z ]*$/",$s_first))
echo "Only letters and white space allowed in the first name";

elseif (!preg_match("/^[a-zA-Z ]*$/",$s_last))
echo "Only letters and white space allowed in the last name ";


 elseif(strlen($s_mobilenumber)!=10)
echo "Mobile number should be of 10 digit";
 else
 {
$insert_student="INSERT INTO offlinepay(first,last,address,Book_id,ordered_quantity,email,mobilenumber,order_date) values('$s_first','$s_last','$s_address','$s_bookid','$qty','$s_email','$s_mobilenumber','$order_date')";
 
 $run_student = mysqli_query($db,$insert_student);
 ?>
 <script type="text/javascript">
  alert("Order saved");
  window.open("vieworder1.php");
 </script>
 <?php 
}
}
 ?>
 