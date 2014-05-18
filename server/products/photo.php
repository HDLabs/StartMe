<?php
include('connect.php');
$name = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$name='uploads/'.$_GET['pid'].'.png';
$pid=$_GET['pid'];
if(move_uploaded_file($tmp,$name)){
mysql_query("UPDATE addproducts SET img='$name' WHERE pid='$pid'");
error_log($tmp." ".$name, 3, "error");
}

?>