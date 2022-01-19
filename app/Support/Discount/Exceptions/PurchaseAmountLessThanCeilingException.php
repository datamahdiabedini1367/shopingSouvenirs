<?php


namespace App\Support\Discount\Exceptions;

use Exception;

class PurchaseAmountLessThanCeilingException extends Exception
{
    public $limit;

    public function __construct($limit)
    {
        $this->limit = $limit;

    }
}
