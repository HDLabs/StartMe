<?php
Include('connect.php');
//if submit is not blanked i.e. it is clicked.

If($_REQUEST['name']=='' || $_REQUEST['email']=='' )
{
Echo "please fill the empty field.";
}
Else
{

$name = $_GET['name'];
$address = $_GET['address'];
$number = $_GET['number'];
$company = $_GET['company'];
$website = $_GET['website'];
$verified = $_GET['verified'];
$misc = $_GET['misc'];
$email = $_GET['email'];

$sql="INSERT INTO users (name, company, address, number, website, verified, misc, email)
VALUES ('$name', '$company', '$address', '$number', '$website', '$verified', '$misc','$email')";
$res=mysql_query($sql);
If($res)
{
$results['response'] = "Validation Right";
$results['validation'] = "ok"; 
}
else 
{
$results['response '] =" Some error";
$results['validation'] = "error";
}
$resultJson = json_encode($results);
echo $resultJson ;

}



mysql_close($con);
?>