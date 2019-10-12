<?php
declare(strict_types=1);

namespace App\Start;

class JapaneseInvoice implements Invoice
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
        return "会員名: {$customerName->value()} \n";
    }

    public function body(Rentals $rentals): string
    {
        return array_reduce($rentals->value(), function (string $carry, Rental $rental) {
            return $carry .= "タイトル: {$rental->movieTitle()} 金額: {$rental->amount()->value()} \n";
        }, '');
    }

    public function footer(Amount $amount, RentalPoint $rentalPoint): string
    {
        $message = "合計金額 {$amount->value()} \n";
        $message .= "獲得ポイント: {$rentalPoint->value()} ポイント\n";

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