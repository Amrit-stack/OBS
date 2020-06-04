<?php 
$db=new mysqli("localhost","root","","online bookstore");
if ($db->connect_error) {
	die("connection failed".$db->connect_error);
}
 ?>
