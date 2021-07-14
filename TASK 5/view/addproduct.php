<?php
include ('../control/addproductcheck.php');
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>


<!DOCTYPE html>
<html>
<body>
<h2>Add Product</h2>
<form action="" method="post" enctype="multipart/form-data">
Product Name 
<input type="text" name="pname">
Product Description 
<input type="text" name="pdesc">
Product Category 
<input type="text" name="pcate">
Product price 
<input type="number" name="pprice">
Product Image 
<input type="file" name="pimage">

<input type="submit" name="add" value="ADD Product">

</form>

</body>
</html>