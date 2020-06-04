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

    <title>Product filter in php</title>
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
     <h3>Price</h3>
     <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
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

    
            <div class="col-mid-9">
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

</body>
</html>