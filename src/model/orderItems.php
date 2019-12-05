<?php


class orderItems
{
    private $orderID;
    private $productID;
    private $quantity;

    public function __construct($orderID, $productID, $quantity)
    {
        $this->orderID = $orderID;
        $this->productID = $productID;
        $this->quantity = $quantity;
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
}