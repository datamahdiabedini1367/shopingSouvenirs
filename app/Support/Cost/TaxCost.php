<?php


namespace App\Support\Cost;


use App\Support\Cost\Contracts\CostInterface;
use phpDocumentor\Reflection\Types\Collection;

class TaxCost implements Contracts\CostInterface
{
    private $cost;
    public function __construct(CostInterface $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
  {
    // TODO: Implement getCost() method.
  }

  public function getTotalCost()
  {
    // TODO: Implement getTotalCost() method.
  }

  public function persianDescription()
  {
    // TODO: Implement persianDescription() method.
  }

  public function getSummery()
  {
    // TODO: Implement getSummery() method.
  }
}
