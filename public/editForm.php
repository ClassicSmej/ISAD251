<?php

include_once '../src/model/dbContext.php';
session_start();

$db = new dbContext();

//editing an item
$productID = $_REQUEST['EDIT'];
$name = $_REQUEST['NAME'];
$description = $_REQUEST['DESCRIPTION'];
$price = $_REQUEST['PRICE'];
$category = $_REQUEST['CATEGORY'];

$sql = "UPDATE products SET Name = '$name', Description = '$description', Price = '$price', Category = '$category' WHERE ProductID ='$productID'";

$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");

