<?php
include('../model/db.php');


if (isset($_POST['search'])) {

    $connection = new db();
    $conobj=$connection->OpenCon();
    
    $products = $connection->Search($conobj,"product",$_POST['q']);
}
