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
$name = $_REQUEST['NAME'];
$description = $_REQUEST['DESCRIPTION'];
$price = $_REQUEST['PRICE'];
$category = $_REQUEST['CATEGORY'];
$status = $_REQUEST['STATUS'];

$sql = "INSERT INTO products(Name, Description, Price, Category, Status)
VALUES ('$name', '$description', '$price', '$category', '$status')";

$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");

//editing an item
$editName = $_REQUEST['EDITNAME'];
$editDes = $_REQUEST['EDITDES'];
$editPrice = $_REQUEST['EDITPRICE'];
$editCat = $_REQUEST['EDITCAT'];
$editStatus = $_REQUEST['EDITSTATUS'];

$sql = "UPDATE products SET Name = '$editName', Description = '$editDes', Price = '$editPrice', Category = '$editCat', Status = '$editStatus' WHERE ProductID ='$productID'";

$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");