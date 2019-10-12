<?php
declare(strict_types=1);

namespace App\Start;

require_once '../../vendor/autoload.php';

$movie1 = new Movie(
    new MovieTitle('regular Movie'),
    PriceCode::regular()
);
$rental1 = new Rental($movie1, new DaysRented(1));

$movie2 = new Movie(
    new MovieTitle('new release Movie'),
    PriceCode::new_release()
);
$rental2 = new Rental($movie2, new DaysRented(2));

$movie3 = new Movie(
    new MovieTitle('children Movie'),
    PriceCode::children()
);
$rental3 = new Rental($movie3, new DaysRented(3));

$customer = new Customer(
    new CustomerName('tanaka tarou'),
    new Rentals([
        $rental1,
        $rental2,
        $rental3
    ])
);


//$invoice = new EnglishInvoice($customer);
$invoice = new JapaneseInvoice($customer);

echo $invoice->statement();