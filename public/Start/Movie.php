<?php
declare(strict_types=1);

namespace App\Start;

class Movie
{
    /**
     * @var MovieTitle
     */
    private $movieTitle;
    /**
     * @var Price
     */
    private $price;

    public function __construct(MovieTitle $movieTitle, PriceCode $priceCode)
    {
        $this->movieTitle = $movieTitle;
        $this->price = PriceFactory::create($priceCode);
    }

    /**
     * @return MovieTitle
     */
    public function movieTitle(): MovieTitle
    {
        return $this->movieTitle;
    }

    public function amount(DaysRented $daysRented)
    {
        return $this->price->amount($daysRented);
    }

    public function renterPoint(DaysRented $daysRented)
    {
        return $this->price->renterPoint($daysRented);
    }


}