<?php
include("connect.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET")
{
// username and password sent from Form
$username=mysql_real_escape_string($_GET['username']); 
$password=mysql_real_escape_string($_GET['password']); 

$sql="SELECT id FROM users WHERE email='$username' and misc='$password'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if($count==1)
{
$results['response'] = "Validation Right";
$results['validation'] = "ok"; 
}
else 
{
$results['response '] =" Wrong username and password ";
$results['validation'] = "error";
}
$resultJson = json_encode($results);
echo $resultJson ;
}
?>
