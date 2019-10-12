<?php
declare(strict_types=1);

class Rentals
{
    /** @var Rental[] */
    private $value;

    public function __construct(array $rentals)
    {
        $this->value = $rentals;
    }

    /**
     * @return Rental[]
     */
    public function value(): array
    {
        return $this->value;
    }

    public function add(Rental $rental)
    {
        $this->value[] = $rental;
    }

    public function amount(): Amount
    {
        if (count($this->value) === 0) {
            return new Amount(0);
        }

        return array_reduce($this->value, function (Amount $carry, Rental $item) {
            return $carry->plus($item->amount());
        });
    }

    public function rentalPoint(): RentalPoint
    {
        if (count($this->value) === 0) {
            return new RentalPoint(0);
        }

        return array_reduce($this->value, function (RentalPoint $carry, Rental $item) {
            return $carry->plus($item->rentalPoint());
        });
    }

}