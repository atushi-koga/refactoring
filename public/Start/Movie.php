<?php
declare(strict_types=1);

namespace App\Start;

interface Movie
{
    public function movieTitle(): MovieTitle;

    public function amount(DaysRented $daysRented): Amount;

    public function renterPoint(DaysRented $daysRented): RentalPoint;
}