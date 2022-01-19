<?php


namespace App\Support\Cost;


use App\Support\Basket\Basket;
use App\Support\Cost\Contracts\CostInterface;

class BasketCost implements CostInterface
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    /**
     * expenses basket cost
     */
    public function getCost()
    {

       return $this->basket->subTotal();
    }

    /**
     * total basket cost + Previous expenses
     */
    public function getTotalCost()
    {
        return $this->getCost();
    }

    /**
     * persian name basket cost
     */
    public function persianDescription()
    {
        return ' سبد خرید';
    }

    /**
     * summery basket cost
     */
    public function getSummery()
    {
        return [
            $this->persianDescription() => $this->getCost(),
        ];
    }
}
