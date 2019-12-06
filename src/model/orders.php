<?php


class orders
{
    private $orderID;
    private $orderDate;

    //Constructors
    public function __construct($OrderID, $OrderDate)
    {
        $this->orderID = $OrderID;
        $this->orderDate = $OrderDate;
    }

    //Getters
    public function getOrderID()
    {
        return $this->orderID;
    }

    public function getDate()
    {
        return $this->orderDate;
    }
}