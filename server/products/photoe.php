<?php
include('connect.php');
$name = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$name='uploadse/'.$_GET['eid'].'.png';
$eid=$_GET['eid'];

if(move_uploaded_file($tmp,$name)){
mysql_query("UPDATE addevents SET img='$name' WHERE eid='$eid'");

}
else
{
error_log($tmp." ".$name, 3, "error");
}

?>