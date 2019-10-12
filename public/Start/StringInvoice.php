<?php
declare(strict_types=1);

namespace App\Start;

class StringInvoice
{
    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function header(CustomerName $customerName): string
    {
        return "Rental Record for {$customerName->value()} \n";
    }

    public function body(Rentals $rentals): string
    {
        return array_reduce($rentals->value(), function (string $carry, Rental $rental) {
            return $carry .= "Title:{$rental->movieTitle()} Amount:{$rental->amount()->value()} \n";
        }, '');
    }

    public function footer(Amount $amount, RentalPoint $rentalPoint): string
    {
        $message = "Amount owed is {$amount->value()} \n";
        $message .= "You earned {$rentalPoint->value()} rental points \n";

        return $message;
    }

    public function statement(): string
    {
        $customer = $this->customer;
        $message = $this->header($customer->customerName());
        $message .= $this->body($customer->rentals());
        $message .= $this->footer($customer->amount(), $customer->renterPoints());

        return $message;
    }
}