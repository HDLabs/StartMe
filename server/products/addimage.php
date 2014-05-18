<?php
include('connect.php');
session_start();
$session_id='1'; //$session id

$path = "uploads/";
?>
<html>
<head>
<title>Image crop with jquery</title>
</head>
<link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.imgareaselect.pack.js"></script>

<?php

	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST['submit']))
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats) && $size<(1024*1024))
						{
							$actual_image_name = time().substr($txt, 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
									$image="<h1>Please drag on the image</h1><img src='uploads/".$actual_image_name."' id=\"photo\" style='max-width:500px' >";
									
								}
							else
								echo "failed";
						}
					else
						echo "Invalid file formats..!";					
				}
			else
				echo "Please select image..!";
		}
?>
<body>
<a href='http://9lessons.info'>9lessons.info</a>
<div style="margin:0 auto; width:600px">
<?php echo $image; ?>
<div id="thumbs" style="padding:5px; width:600px"></div>
<div style="width:600px">

<form id="cropimage" method="post" enctype="multipart/form-data">
	Upload your image <input type="file" name="photoimg" id="photoimg" />
	<input type="hidden" name="image_name" id="image_name" value="<?php echo($actual_image_name)?>" />
	<input type="submit" name="submit" value="Submit" />
</form>

</div>
</div>
</body>
</html>