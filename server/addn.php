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



$sql="INSERT INTO addnews (name, company, cat, info, website)
VALUES ('$name', '$company', '$cat', '$info', '$website')";
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
$sql = "SELECT `nid` FROM `addnews` ORDER BY `nid` DESC LIMIT 1";

$nid=mysql_fetch_array( mysql_query($sql));


$results['nid'] = $nid['nid']; 
$resultJson = json_encode($results);
echo $resultJson ;
}
}


mysql_close($con);
?>