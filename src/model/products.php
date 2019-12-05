<?php

class products
{
    private $ID;
    private $description;
    private $price;
    private $category;
    private $stockNo;

    public function __construct($ID, $description, $price, $category, $stockNo)
    {
        $this->ProductID = $ID;
        $this->Description = $description;
        $this->Price = $price;
        $this->Category = $category;
        $this->StockNo = $stockNo;
    }

    public function ID()
    {
        return $this->ID;
    }

    public function Description()
    {
        return $this->description;
    }

    public function Price()
    {
        return $this->price;
    }

    public function Category()
    {
        return $this->category;
    }

    public function StockNo()
    {
        return $this->stockNo;
    }
}
