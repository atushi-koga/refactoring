<?php
declare(strict_types=1);

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
        $this->rentals[] = $rental;
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