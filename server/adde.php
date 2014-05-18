<?php
Include('connect.php');
//if submit is not blanked i.e. it is clicked.

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



$sql="INSERT INTO addevents (name, company, cat, info, website)
VALUES ('$name', '$company', '$cat', '$info', '$website')";
$res=mysql_query($sql);
If($res)
{

$results['response'] = "Validation Right";
$results['validation'] = "ok"; 

}
Else
{
$results['response '] =" Error ";
$results['validation'] = "error";
}
$sql1 = "SELECT `eid` FROM `addevents` ORDER BY `eid` DESC LIMIT 1";

$eid=mysql_fetch_array( mysql_query($sql1));


$results['eid'] = $eid['eid']; 
$resultJson = json_encode($results);
echo $resultJson ;
}



mysql_close($con);
?>