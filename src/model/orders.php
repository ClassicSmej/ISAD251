<?php


class orders
{
    private $orderID;
    private $orderDate;

    public function __construct($orderID, $orderDate)
    {
        $this->OrderID = $orderID;
        $this->Date = $orderDate;
    }

    public function getOrderID()
    {
        return $this->orderID;
    }

    public function getDate()
    {
        return $this->orderDate;
    }
}