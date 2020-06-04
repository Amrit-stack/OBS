
<?php
include('data_connection.php');
if(isset($_POST["action"]))
{
 $query ="
  SELECT * FROM books WHERE product_status = '1' ";

 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND Book_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 if(isset($_POST["Book_id"]))
 {
  $id_filter = implode("','", $_POST["Book_id"]);
  $query .= "AND Book_id IN('".$id_filter."')
  ";
 }
 if(isset($_POST["Book_title"]))
 {
  $title_filter = implode("','", $_POST["Book_title"]);
  $query .= "
   AND Book_title IN('".$title_filter."')
  ";
 }
 if(isset($_POST["Categories"]))
 {
  $categories_filter = implode("','", $_POST["Categories"]);
  $query .= "
   AND Categories IN('".$categories_filter."')
  ";
 }


 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   ?>

    <div class="col-sm-2 col-lg-2 col-md-2"><br>
      <form method="post" action="vieworder.php?action=add&Book_id=<?php echo $row["Book_id"]; ?>"> 
    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  Available quantity<h4 class="text-info"><?php echo $row["Book_quantity"]; ?></h4>
                               <img src="<?php echo $row["Book_image"]; ?>" class="img-responsive" /><br />  
                             <h4 class="text-danger"><?php echo $row["Book_title"]; ?></h4>
                               published by<h4 class="text-info"><?php echo $row["Publisher_name"]; ?></h4>  
                               <h4 class="text-danger">Nrs. <?php echo $row["Book_price"]; ?></h4>  
                                 <input type="hidden" name="hidden_price" value="<?php echo $row["Book_price"]; ?>" />
                               <input type="hidden" name="hidden_name" value="<?php echo $row["Book_title"]; ?>" />
                                <input type="hidden" name="hidden_publisher" value="<?php echo $row["Publisher_name"]; ?>" />  
                                   
                              
                               
                               </div>
                             </form>
                               </div>
  

  <?php                       

  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?> 
