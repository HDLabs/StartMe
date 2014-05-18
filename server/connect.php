<?php
$hostname="localhost"; //local server name default localhost
$username="domexcp_main";  //mysql username default is root.
$password="UI8hX-268(0&";       //blank if no password is set for mysql.
$database="domexcp_main";  //database name which you created
$con=mysql_connect($hostname,$username,$password);
if(! $con)
{
die('Connection Failed'.mysql_error());
}

mysql_select_db($database,$con);
?>