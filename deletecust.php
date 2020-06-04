<?php
include "connection.php";
session_start();
 $query="delete from offlinepay where Book_id={$_GET["Book_id"]}";
 $db->query($query);
 echo "<script>window.open('offvieworder.php?mes=Data deleted.','_self');</script>";
echo "Deleted Successfully";
?>