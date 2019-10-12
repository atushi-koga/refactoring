<?php
declare(strict_types=1);

namespace App\Start;

class RegularMovie implements Movie
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
        $this->priceCode = PriceCode::REGULAR;
    }

    /**
     * @return MovieTitle
     */
    public function movieTitle(): MovieTitle
    {
        return $this->movieTitle;
    }

    public function amount(DaysRented $daysRented): Amount
    {
        $amount = new Amount(2);
        if ($daysRented->value() > 2) {
            $amount->plus(new Amount(($daysRented->value() - 2) * 1.5));
        }

        return $amount;
    }

    public function renterPoint(DaysRented $daysRented): RentalPoint
    {
        return new RentalPoint(1);
    }
}