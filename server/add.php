<?php
Include('connect.php');
//if submit is not blanked i.e. it is clicked.
If(isset($_REQUEST['login'])!='')
{
If($_REQUEST['name']=='' || $_REQUEST['info']=='' )
{
Echo "please fill the empty field.";
}
Else
{

$name = $_GET['name'];
$company = $_GET['company'];
$cat = $_GET['cat'];
$info = $_GET['info'];
$website = $_GET['website'];
$link = $_GET['link'];


$sql="INSERT INTO addproducts (name, company, cat, info, website, link, img)
VALUES ('$name', '$company', '$cat', '$info', '$website', '$link', '$img')";
$res=mysql_query($sql);
If($res)
{

$results['response'] = "Validation Right";
$results['validation'] = "ok"; 

}
Else
{
$results['response '] =" Wrong username and password ";
$results['validation'] = "error";
}
$sql = "SELECT `pid` FROM `addproducts` ORDER BY `pid` DESC LIMIT 1";

$pid=mysql_fetch_array( mysql_query($sql));


$results['pid'] = $pid['pid']; 
$resultJson = json_encode($results);
echo $resultJson ;
}
}


mysql_close($con);
?>