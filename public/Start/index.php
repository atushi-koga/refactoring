<?php
declare(strict_types=1);

namespace App\Start;

require_once '../../vendor/autoload.php';

$customer = new Customer(new CustomerName('tanaka tarou'));

$movie1 = new RegularMovie(new MovieTitle('regular Movie 1'));
$rental = new Rental($movie1, new DaysRented(1));
$customer->addRental($rental);

$invoice = new StringInvoice($customer);

echo $invoice->statement();