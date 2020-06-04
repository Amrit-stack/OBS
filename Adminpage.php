


<?php

include "connection.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location:Adminlogin.php');

}
 ?>
<!DOCTYPE html><!-- The new doctype -->
<html lang="en">
<head>
    <title>Online BookStore</title>
    <meta charset="utf-8">



    <!-- Linking styles -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/menu.css" type="text/css" media="screen">
    <!-- Linking scripts -->
    <!--[if lt IE 9]>
        <script src="js/html5.js"></script>
    <![endif]-->
</head>
<body>
    <header><!-- Defining the header section of the page -->
      
    </header>
    <!-- Defining main logo -->
    <div class="logo">
  <CENTER><H1>BROADEN YOUR KNOWLEDGE</H1></CENTER>
    </div>
    <section class="content"><!-- Defining the main content section of the page -->
        
    </section>
    <footer><!-- Defining the footer section of the page -->
        
    </footer>
  


  
</table>

</body>
<style type="text/css">
  /* base common styles */
article, aside, audio, canvas, command, datalist, details, embed, figcaption, figure, footer, header, hgroup, keygen, meter, nav, output, progress, section, source, video {display:block;}
mark, rp, rt, ruby, summary, time {display:inline;}
* {
    margin:0;
    padding:0;
}
img {
    border-width:0;
}
body { 
  background-image: url('sea.jpg');
    color:black;
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size:0.75em;
}
a {
    color:#c46501;
    text-decoration:underline;
}
a:hover {
    text-decoration:none;
}
.clear {
    clear:both;
    display:block;
    height:0;
    overflow:hidden;
    visibility:hidden;
    width:0;
} 
</style>
<header><!-- Defining the header section of the page -->
    <div class="header">
        <nav>
        <ul>
        <li><a href="adminadd.php">Add books</a></li>
        
        <li><a href="offvieworder.php">Customer details</a></li>
           <li><a href="sellview.php">Seller details</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </nav>
    </div>
</header>
<!-- Defining main logo -->
<style type="text/css">
  /*header*/
header {
    background-color:green;
}
header .header {
    overflow:hidden;
    position:relative;
    width:960px;
    height:60px;
    margin:0 auto;
}
header .search {
    float:right;
    margin-top:10px;
    width:300px;
}
header .search input[type=text] {
    background-color:#443e30;
    border:1px solid #2F2C29;
    color:#FFF;
    font-size:1em;
    height:20px;
    margin-right:5px;
    width:203px;
    padding:1px 0 0 3px;
}
header .search input[type=submit] {
    background-image:url(../images/search.gif);
    height:21px;
    width:60px;
    font-size:0.9em;
    border-width:0;
}
header .social_icons {
    float:right;
    margin-right:5px;
    margin-top:5px;
}
.logo {
  background-image: url("bookstore.jpg");
    position:relative;
    width:1000px;
    height:225px;
    margin:0 auto;
}
.logo img {
    margin:2px 1px;
}
footer{
background-color: green;
color:white;
padding-top: 5px;
width:100%;
height:100%;
}

</style>
<section class="content"><!-- Defining the main content section of the page -->
    <!-- navigation menu -->
    

                <style>
 *{
            box-sizing: border-box;
        }
        body{
            margin: 0;
            
            background-color:white;
            color: black;
            font-family: Calibri, sans-serif;
        }

        .center{
          font-size: 25px;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: left;
            align-items: left;
        }

        .center p{
            width: 70%;
            font-size: 10px;
            display: block;
            text-align:left;
            font-size:5px;
        }

        .char{
            font-size: 40px;
            height: 40px;
            animation: an 1s ease-out 1 both;
            display: inline-block;
        }

        @keyframes an{
            from{
                opacity: 0;
                transform: perspective(500px) translate3d(-35px, -40px, -150px) rotate3d(1, -1, 0, 35deg);
            }
            to{
                opacity: 1;
                transform: perspective(500px) translate3d(0, 0, 0);
            }
        }
.mylink{
  position: absolute;
  z-index: 150;
  bottom: 0;
  right: 0;
  width: 100%;
  text-align: right;
  padding: .6rem;
}

.mylink a{
  font-family: Calibri;
  color: #fff;
  border-bottom: 1px solid #fff;
  opacity: .5;
  transition: opacity .3s;
  text-decoration: none
}
.mylink a:hover{
  opacity: 1
}
</style>
            </div>
            
        </div>
        
   
            
        </div>
    </div>
    
<style type="text/css">
  nav {
    overflow:hidden;
    position:relative;
    width:910px;
    background:url("../images/menu-bg.png") no-repeat scroll left top transparent;
    margin:10px auto;
    padding:10px;
}
nav ul {
    list-style-image:none;
    list-style-position:outside;
    list-style-type:none;
    overflow:hidden;
    margin:0;
    padding:0;
}
nav ul li {
    background:url("../images/menu-devider.gif") no-repeat scroll left top transparent;
    float:left;
    font-size:1.5em;
    line-height:normal;
    margin-left:-2px;
    overflow:hidden;
    padding:0;
}
nav ul li a {
  font-size: 25px;
    color:darkred;
    display:block;
    font-family:Tahoma,Arial,Helvetica,serif;
    font-weight:400;
    text-decoration:none;
    text-transform:none;
    padding:3px 24px 5px 26px;
}
nav ul li a:hover {
    text-decoration:none;
    color:#fc0;
}

</style>



</html>
<?php 
include('data_connection.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adminpage</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
         <br />
         <h2 align="center">Here are the books!</h2>
         <br />
<div class="col-md-3">                    
    <div class="list-group">
     
     
                  
                </div>    
                
            

    <div class="list-group">
         <h3>Book_id</h3>
                    
     <?php

                    $query = "SELECT DISTINCT(Book_id) FROM books WHERE product_status = '1' ORDER BY Book_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Book_id" value="<?php echo $row['Book_id']; ?>"  > <?php echo $row['Book_id']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                

     
    <div class="list-group">
     <h3>Book_title</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(Book_title) FROM books WHERE product_status = '1' ORDER BY Book_title DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Book_title" value="<?php echo $row['Book_title']; ?>" > <?php echo $row['Book_title']; ?> </label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>

    <div class="list-group">
     <h3>Categories</h3>
     <?php
                    $query = "
                    SELECT DISTINCT(Categories) FROM books WHERE product_status = '1' ORDER BY Categories DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector Categories" value="<?php echo $row['Categories']; ?>"  > <?php echo $row['Categories']; ?></label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>
            </div>

    
            <div class="col-mid-12">
                </br>
                <div class="row filter_data">
                    
                </div>
            </div>
        </div>

<style>
#loading
{
 text-align:center;  
 height: 150px;
}
</style>

<script>
$(document).ready(function(){

filter_data();
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var Book_id = get_filter('Book_id');
        var Book_title = get_filter('Book_title');
        var Categories = get_filter('Categories');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, Book_id:Book_id, Book_title:Book_title, Categories:Categories},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
<br>
<footer class="page-footer font-small mdb-color pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">About Us</h6>
        <p>Hi this is an online bookstore where you can buy or sell the books of different categories</p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
        <p>
          <a href="Adminpage.php">My Account</a>
        </p>
        
        </p>
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fas fa-home mr-3"></i> Mulpani,Kathmandu, Nepal</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 9779818389513</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 9779843177261</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

<!-- Footer -->



<center><h4>copyright@2019:online bookstore</h4></center>
    </footer>


</body>
</html>