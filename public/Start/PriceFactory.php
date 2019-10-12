<?php
declare(strict_types=1);

namespace App\Start;

class PriceFactory
{
    public static function create(PriceCode $priceCode): Price
    {
        switch ($priceCode->value()) {
            case PriceCode::REGULAR:
                return new RegularPrice();
            case PriceCode::NEW_RELEASE:
                return new NewReleasePrice();
            case PriceCode::CHILDREN:
                return new ChildrenPrice();
            default:
                throw new \InvalidArgumentException("未定義のコードです {$priceCode->value()}");
        }
    }
}