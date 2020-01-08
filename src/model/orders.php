<?php

class orders
{
    private $orderID;
    private $orderDate;

    //Constructors
    public function __construct($OrderID, $OrderDate)
    {
        $this->orderID = $OrderID;
        $this->orderDate = getdate();
    }

    //Getters
    public function getOrderID()
    {
        return $this->orderID;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    //Setters
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    }


}