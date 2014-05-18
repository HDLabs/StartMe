<?php

include('connect.php');
//if submit is not blanked i.e. it is clicked.
If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['image1']=='' || $_REQUEST['price']=='' )
{
Echo "please fill the empty field.";
}
Else
{

$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$image1=$_POST['image1'];
$image2=$_POST['image2'];
$image3=$_POST['image3'];
$features=$_POST['features'];
$cat=$_POST['cat'];
$buy_url=$_POST['buy_url'];

$sql="INSERT INTO users (name, price, image1, image2, image3, features, cat, buy_url)
VALUES ('$name', '$price', '$image1', '$image2', '$image3', '$features','$cat','$buy_url')";
echo $sql;
$res=mysql_query($sql);
If($res)
{
Echo "Record successfully inserted";
}
Else
{
Echo "There is some problem in inserting record";
}

}
}
mysql_close($con);

?> 
<html>

<form method="POST" action="add_products.php">
<table>
<tr> <td>Name</td> <td> <input type="text" name="name"/> </td>
</tr>
<tr> <td>Price </td> <td> <input type="text" name="price"/> </td>
</tr>
<tr> <td>Image1 </td> <td> <input type="text" name="image"/> </td> 
</tr>
<tr> <td>Image2</td> <td> <input type="text" name="image2"/> </td>
</tr>
<tr> <td>Image3</td> <td> <input type="text" name="image3"/> </td>
</tr>
<tr> <td>Features</td> <td> <input type="text" name="features"/> </td>
</tr>
<tr> <td>Category</td> <td> <input type="text" name="cat"/> </td>
</tr>
<tr> <td>Url</td> <td> <input type="text" name="buy_url"/> </td>
</tr>

</table>
<input type="submit" value="submit"/>
</form>



</html>
