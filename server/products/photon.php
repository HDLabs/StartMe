<?php
include('connect.php');
$name = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$name='uploadsn/'.$_GET['nid'].'.png';
$nid=$_GET['nid'];
if(move_uploaded_file($tmp,$name)){
mysql_query("UPDATE addnews SET img='$name' WHERE nid='$nid'");

}

?>