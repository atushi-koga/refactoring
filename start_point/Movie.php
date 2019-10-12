<?php
declare(strict_types=1);

interface Movie
{
    public function movieTitle(): MovieTitle;

    public function amount(DaysRented $daysRented): Amount;

    public function renterPoint(DaysRented $daysRented): RentalPoint;
}