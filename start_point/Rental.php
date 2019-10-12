<?php
declare(strict_types=1);

class Rental
{
    /**
     * @var Movie
     */
    private $movie;
    /**
     * @var DaysRented
     */
    private $daysRented;

    public function __construct(Movie $movie, DaysRented $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function movieTitle(): string
    {
        return $this->movie->movieTitle()->value();
    }

    public function amount(): Amount
    {
        return $this->movie->amount($this->daysRented);
    }

    public function rentalPoint(): RentalPoint
    {
        return $this->movie->renterPoint($this->daysRented);
    }
}