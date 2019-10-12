<?php
declare(strict_types=1);

namespace App\Start;

abstract class Price
{
    abstract public function amount(DaysRented $daysRented): Amount;

    public function renterPoint(DaysRented $daysRented): RentalPoint
    {
        return new RentalPoint(1);
    }
}