<?php
declare(strict_types=1);

namespace App\Start;

use App\Type\Enum\EnumTrait;

class PriceCode
{
    use EnumTrait;

    const CHILDREN = 2;

    const REGULAR = 0;

    const NEW_RELEASE = 1;

    public static  function children(): self
    {
        return new self(self::CHILDREN);
    }

    public static  function regular(): self
    {
        return new self(self::REGULAR);
    }

    public static  function new_release(): self
    {
        return new self(self::NEW_RELEASE);
    }
}