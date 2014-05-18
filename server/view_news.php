<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NEWS</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/contact-form.css">
	<script type="text/javascript" src="cordova-2.7.0.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
	
</head>
<body class="c-form">
<section style="
    padding: 10px;
">
<h1> News</h1>

<?php

include('connect.php');


$sql = 'SELECT nid,company,name,cat,info,website,img FROM addnews';

$retval = mysql_query( $sql, $con );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{   echo "<div class='item' >";
    if($row['img']){
		echo "<img class='imagebox' src='products/{$row['img']}'/>  "; }
	else
	  { echo "<img class='imagebox' src='images/no-image.jpg'/>  "; }
	
	echo "Name :{$row['name']}  <br> ".
         "Company: {$row['company']} <br> ".
         "Category: {$row['cat']} <br> ".
         "Features : {$row['info']} <br> ".
		 "<a href='{$row['website']}'> Website </a> <br>";
	
          echo "</div>"; 
} 
//echo "Fetched data successfully\n";
mysql_close($con);
?>

</section>
</body>
</html>