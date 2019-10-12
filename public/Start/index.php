<?php
declare(strict_types=1);

namespace App\Start;

require_once '../../vendor/autoload.php';

$customer = new Customer(new CustomerName('tanaka tarou'));

$movie1 = new RegularMovie(new MovieTitle('regular Movie 1'));
$rental1 = new Rental($movie1, new DaysRented(1));

$movie2 = new ChildrenMovie(new MovieTitle('children Movie 1'));
$rental2 = new Rental($movie2, new DaysRented(2));

$movie3 = new RegularMovie(new MovieTitle('regular Movie 2'));
$rental3 = new Rental($movie3, new DaysRented(3));

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

//$invoice = new EnglishInvoice($customer);
$invoice = new JapaneseInvoice($customer);

echo $invoice->statement();