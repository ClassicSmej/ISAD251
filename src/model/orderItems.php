<?php

class orderItems
{
    private $orderID;
    private $productID;
    private $quantity;

    //Constructor
    public function __construct($OrderID, $ProductID, $Quantity)
    {
        $this->orderID = $OrderID;
        $this->productID = $ProductID;
        $this->quantity = $Quantity;
    }

    //Getters
    public function getOrderID()
    {
        return $this->orderID;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}