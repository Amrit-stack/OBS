<?php   
include"connection.php";
session_start();   
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");  
           if(!in_array($_GET["Book_id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(

                  
                     'item_id'               =>     $_GET["Book_id"], 
                    

                     'Book_title'               =>     $_POST["hidden_name"],  
                      
                     'Book_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }


           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="vieworder1.php"</script>';  
           }  
      }  

    
      else  
      {  
           $item_array = array(  
                       'item_id'               =>     $_GET["Book_id"],
                       

                     'Book_title'               =>     $_POST["hidden_name"],  
                     'Book_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"] 
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["Book_id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="vieworder1.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Add to Cart</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr> 
                            
                              <th width="40%">Book Id</th>  
                         
                               <th width="40%">Book Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th> 
                                 
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               { 


                          ?>  
                          <tr> 
                               <td><?php echo $values["item_id"]; ?></td>
                                  
                               <td><?php echo $values["Book_title"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>Nrs <?php echo $values["Book_price"]; ?></td>  
                               <td>Nrs <?php echo number_format($values["item_quantity"] * $values["Book_price"], 2); ?></td>  
                               <td><a href="vieworder1.php?action=delete&Book_id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td> 
                               <td align="right"> <a href="order.php?action=&Book_id=<?php echo $values["item_id"]; ?>">Order</a></td>
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["Book_price"]);
                               }
                          ?> 

                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">Nrs. <?php echo number_format($total, 2); ?></td> 
                               
                               <td></td>  
                          </tr> 

                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br /> 
           <a href="userpage.php">Back</a> 
      </body>  
 </html>