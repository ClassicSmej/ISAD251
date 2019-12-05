<?php

class product
{
    private $productID;
    private $description;
    private $price;
    private $category;
    private $stockNo;

    public function __construct($productID, $description, $price, $category, $stockNo)
    {
        $this->ProductID = $productID;
        $this->Description = $description;
        $this->Price = $price;
        $this->Category = $category;
        $this->StockNo = $stockNo;
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
