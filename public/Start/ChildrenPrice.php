<?php
declare(strict_types=1);

namespace App\Start;

class ChildrenPrice extends Price
{
    /** @var PriceCode */
    private $priceCode;

    public function __construct()
    {
        $this->priceCode = PriceCode::CHILDREN;
    }

    public function amount(DaysRented $daysRented): Amount
    {
        $amount = new Amount(1.5);
        if ($daysRented->value() > 3) {
            $amount->plus(new Amount(($daysRented->value() - 3) * 1.5));
        }

        return $amount;
    }
}