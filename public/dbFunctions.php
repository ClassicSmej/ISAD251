<?php

include_once '../src/model/dbContext.php';
session_start();

$db = new dbContext();

//removing item
$productID = $_REQUEST['REMOVE'];

$sql = "UPDATE products SET Status = 'Not on Sale' WHERE ProductID ='$productID'";
$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");

//adding item to menu
$productID = $_REQUEST['PUSH'];

$sql = "UPDATE products SET Status = 'On Sale' WHERE ProductID ='$productID'";
$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");

//adding new item
$new = $_REQUEST['NEW'];
$productID = $_REQUEST['ID'];
$name = $_REQUEST['NAME'];
$description= $_REQUEST['DESCRIPTION'];
$price = $_REQUEST['PRICE'];
$category = $_REQUEST['CATEGORY'];
$status = $_REQUEST['STATUS'];

$sql = "INSERT INTO products(ProductID, Name, Description, Price, Category, Status)
VALUES ('$productID', '$name', '$description', '$price', '$category', '$status')";

$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");