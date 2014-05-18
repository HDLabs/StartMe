<?php
include('connect.php');
session_start();
$session_id='1'; // Session_id
$t_width = 250;	// Maximum thumbnail width
$t_height = 250;	// Maximum thumbnail height

$path = "uploads/";
if(isset($_GET['t']) and $_GET['t'] == "ajax")
	{
	$sql="INSERT INTO uploads (uid, name, company, price, category, detail, link)
VALUES ('$name', '$company', '$price', '$category', '$detail', '$link', '$misc','$email')";
$res=mysql_query($sql);
If($res)
{
Echo "";
}
Else
{
Echo "";
}
$sql = "SELECT `pid` FROM `uploads` ORDER BY `pid` DESC LIMIT 1";

$pid=mysql_query($sql);

$new_name = "large".$pid.".jpg"; // Thumbnail image name

		extract($_GET);
		$ratio = ($t_width/$w); 
		$nw = ceil($w * $ratio);
		$nh = ceil($h * $ratio);
		$nimg = imagecreatetruecolor($nw,$nh);
		$im_src = imagecreatefromjpeg($path.$img);
		imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w,$h);
		imagejpeg($nimg,$path.$new_name,90);
		


		mysql_query("UPDATE uploads SET small='$new_name' WHERE pid='$pid'");
		echo $new_name."?".time();
		exit;
	}
	
	?>