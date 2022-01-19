<?php


namespace App\Support\Cost;


use App\Support\Cost\Contracts\CostInterface;

class ShipingCost implements CostInterface
{
    const SHIPPING_COST = 20000;

    private $cost;

    public function __construct(CostInterface $cost)
    {
        $this->cost = $cost;
    }


    public function getCost()
    {
        return self::SHIPPING_COST;
    }

    public function getTotalCost()
    {
        return $this->cost->getTotalCost() + $this->getCost();
    }

    public function persianDescription()
    {
        return 'هزینه ارسال';
    }

    public function getSummery()
    {
        return array_merge($this->cost->getSummery() ,[
            $this->persianDescription()=>$this->getCost()
        ]);
    }
}
