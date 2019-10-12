<?php
declare(strict_types=1);

namespace App\Start;

class ChildrenMovie implements Movie
{
    /**
     * @var MovieTitle
     */
    private $movieTitle;

    /**
     * @var PriceCode
     */
    private $priceCode;

    public function __construct(MovieTitle $movieTitle)
    {
        $this->movieTitle = $movieTitle;
        $this->priceCode = PriceCode::CHILDREN;
    }

    public function movieTitle(): MovieTitle
    {
        return $this->movieTitle;
    }

    public function amount(DaysRented $daysRented): Amount
    {
        $amount = new Amount(1.5);
        if ($daysRented->value() > 3) {
            $amount->plus(new Amount(($daysRented->value() - 3) * 1.5));
        }

        return $amount;
    }

    public function renterPoint(DaysRented $daysRented): RentalPoint
    {
        return new RentalPoint(0);
    }
}