<?php

class orderItems
{
    private $itemNo;
    private $orderID;
    private $productID;
    private $quantity;

    //Constructor
    public function __construct($ItemNo, $OrderID, $ProductID, $Quantity)
    {
        $this->itemNo = $ItemNo;
        $this->orderID = $OrderID;
        $this->productID = $ProductID;
        $this->quantity = $Quantity;
    }

    //Getters
    public function getItemNo()
    {
        return $this->itemNo;
    }

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

    //Setters
    public function setItemNo($itemNo)
    {
        $this->itemNo = $itemNo;
    }

    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }



}