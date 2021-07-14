<?php
session_start();
if (empty($_SESSION["username"])) // Destroying All Sessions
{
    header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>

<body>
    <h2>All products</h2>

    <?php
    $connection = new db();
    $conobj = $connection->OpenCon();

    $products = $connection->ShowAll($conobj, "product");

    if ($products->num_rows > 0) {
        // output data of each row
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