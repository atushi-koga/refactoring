<?php
declare(strict_types=1);

namespace App\Start;

class NewReleasePrice extends Price
{
    /** @var PriceCode */
    private $priceCode;

    public function __construct()
    {
        $this->priceCode = PriceCode::REGULAR;
    }

    public function amount(DaysRented $daysRented): Amount
    {
        return new Amount($daysRented->value() * 3);
    }

    public function renterPoint(DaysRented $daysRented): RentalPoint
    {
        if ($daysRented->value() > 1) {
            return new RentalPoint(2);
        }

        return new RentalPoint(1);
    }
}