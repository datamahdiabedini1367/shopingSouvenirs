<?php


namespace App\Support\Cost;


use App\Support\Cost\Contracts\CostInterface;
use App\Support\Discount\DiscountManager;

class DiscountCost implements CostInterface
{
    const SHIPPING_COST = 20000;

    private $cost;
    private $discountManager;

    public function __construct(CostInterface $cost , DiscountManager $discountManager)
    {
        $this->cost = $cost;
        $this->discountManager = $discountManager;
    }


    public function getCost()
    {
        return $this->discountManager->calculateUserDiscount();
    }

    public function getTotalCost()
    {
        return $this->cost->getTotalCost() - $this->getCost();
    }

    public function persianDescription()
    {
        return 'میزان تخفیف';
    }

    public function getSummery()
    {
        return array_merge($this->cost->getSummery() ,[
            $this->persianDescription()=>$this->getCost()
        ]);
    }
}
