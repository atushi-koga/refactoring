<?php
declare(strict_types=1);

namespace App\Start;

class RegularPrice extends Price
{
    /** @var PriceCode */
    private $priceCode;

    public function __construct()
    {
        $this->priceCode = PriceCode::REGULAR;
    }

    public function amount(DaysRented $daysRented): Amount
    {
        $amount = new Amount(2);
        if ($daysRented->value() > 2) {
            $amount = $amount->plus(new Amount(($daysRented->value() - 2) * 1.5));
        }

        return $amount;
    }
}