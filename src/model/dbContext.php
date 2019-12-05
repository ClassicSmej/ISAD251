<?php

include_once 'product.php';

class dbContext
{
    private $db_server = 'Proj-mysql.uopnet.plymouth.ac.uk';
    private $dbUser = 'ISAD251_JWhite';
    private $dbPassword = 'ISAD251_22201429';
    private $dbDatabase = 'ISAD251_jwhite';
    private $dataSourceName;
    private $connection;

    public function __construct(PDO $connection = null)
    {
        $this->connection = $connection;
        try {
            if ($this->connection === null) {
                $this->dataSourceName = 'mysql:dbname=' . $this->dbDatabase . ';host=' . $this->db_server;
                $this->connection = new PDO($this->dataSourceName, $this->dbUser, $this->dbPassword);
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }
        }catch (PDOException $err)
        {
            echo 'Connection failed: ', $err->getMessage();
        }
    }

    public function getAll($tableName)
    {
        $sql = "SELECT * FROM ";
        switch ($tableName)
        {
            case "Products" : $sql = $sql." products";
                break;
            case "Customers" : $sql = $sql." orderitems";
                break;
            case "Orders" : $sql = $sql." orders";
                break;
        }

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $resultSet;
    }

    public function Products()
    {
        $sql = "SELECT * FROM `products`";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

        $products = [];

        if($resultSet)
        {
            foreach($resultSet as $row)
            {
                $product = new Product($row['ProductID'], $row['Description'], $row['Price'], $row['Category'], $row['StockNo']);
                $products[] = $product;
            }
        }
        return $products;
    }
}