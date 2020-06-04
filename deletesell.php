<?php
include "connection.php";
session_start();
 $query="delete from books where Book_id={$_GET["Book_id"]}";
 $db->query($query);
 echo "<script>window.open('sellview.php?mes=Data deleted.','_self');</script>";

?>