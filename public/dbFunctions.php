<?php

//Database Connection Variables
const DB_SERVER = 'proj-mysql.uopnet.plymouth.ac.uk';
const DB_USER = 'ISAD251_JWhite';
const DB_PASSWORD = 'ISAD251_22201429';
const DB_DATABASE = 'isad251_jwhite';

//Establish Connection
function getConnection() {
    $dataSourceName = 'mysql:dbname='.DB_DATABASE.'host='.DB_SERVER;
    $dbConnection = null;
    try
    {
        $dbConnection = new PDO($dataSourceName, DB_USER, DB_PASSWORD);

    } catch (PDOException $err)
    {
        echo 'CONNECTION ERROR: ', $err->getMessage();
    }
    return $dbConnection;
}

//Retrieve Table Data
function getAll($tablename)
{
    $statement = getConnection()->prepare("SELECT * FROM" . $tablename);
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $resultSet;
}
