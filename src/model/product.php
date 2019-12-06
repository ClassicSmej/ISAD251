<?php

class product
{
    private $productID;
    private $description;
    private $price;
    private $category;
    private $stockNo;

    public function __construct($ProductID, $Description, $Price, $Category, $StockNo)
    {
        $this->productID = $ProductID;
        $this->description = $Description;
        $this->price = $Price;
        $this->category = $Category;
        $this->stockNo = $StockNo;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getStockNo()
    {
        return $this->stockNo;
    }
}
