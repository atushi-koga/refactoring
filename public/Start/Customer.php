<?php
declare(strict_types=1);

namespace App\Start;

class Customer
{
    /**
     * @var CustomerName
     */
    private $customerName;

    /**
     * @var Rentals
     */
    private $rentals;

    public function __construct(CustomerName $customerName)
    {
        $this->customerName = $customerName;
        $this->rentals = new Rentals([]);
    }

    /**
     * @return CustomerName
     */
    public function customerName(): CustomerName
    {
        return $this->customerName;
    }

    /**
     * @return Rentals
     */
    public function rentals(): Rentals
    {
        return $this->rentals;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals->add($rental);
    }

    public function amount(): Amount
    {
        return $this->rentals->amount();
    }

    public function renterPoints(): RentalPoint
    {
        return $this->rentals->rentalPoint();
    }
}