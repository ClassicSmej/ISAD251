<?php

class details
{
    private $itemID;
    private $orderID;
    private $orderDate;
    private $productID;
    private $name;
    private $quantity;
    private $totalCost;

    //Constructor
    public function __construct($ItemID, $OrderID, $OrderDate, $ProductID, $Name, $Quantity, $TotalCost)
    {
        $this->itemID = $ItemID;
        $this->orderID = $OrderID;
        $this->orderDate = $OrderDate;
        $this->productID = $ProductID;
        $this->name = $Name;
        $this->quantity = $Quantity;
        $this->totalCost = $TotalCost;
    }

    public function getItemID()
    {
        return $this->itemID;
    }

    public function getOrderID()
    {
        return $this->orderID;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getTotalCost()
    {
        return $this->totalCost;
    }
}