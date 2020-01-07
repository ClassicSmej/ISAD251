<?php

class product
{
    private $productID;
    private $name;
    private $description;
    private $price;
    private $category;
    private $status;

    public function __construct($ProductID, $Name, $Description, $Price, $Category, $status)
    {
        $this->productID = $ProductID;
        $this->name = $Name;
        $this->description = $Description;
        $this->price = $Price;
        $this->category = $Category;
        $this->status = $status;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getName()
    {
        return $this->name;
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

    public function getStatus()
    {
        return $this->status;
    }

    //Setters
    function setProductID($productID)
    {
        $this->productID = $productID;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
