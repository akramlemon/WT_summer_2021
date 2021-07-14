<?php
include('../control/searchcheck.php');
session_start();
if (empty($_SESSION["username"])) {
    header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>


<!DOCTYPE html>
<html>

<body>
    <h2>Search Product</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <input placeholder="Search for product" type="text" name="q">
        <input type="submit" name="search" value="Search">
    </form>

    <?php
    if (isset($products) && $products->num_rows > 0) {
        while ($row = $userQuery->fetch_assoc()) {
    ?>
            <p>Name: <?php echo $row["P_Name"] ?></p>
            <p>Description: <?php echo $row["P_Description"] ?></p>
            <p>Category: <?php echo $row["P_Category"] ?></p>
            <p>Price: <?php echo $row["P_Price"] ?></p>
            <img src="<?php echo $row["P_Image"] ?>" alt="">
    <?php
        }
    }
    ?>

</body>

</html>