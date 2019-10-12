<?php
declare(strict_types=1);

namespace App\Start;

class Amount
{
    /**
     * @var float
     */
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function plus(self $other)
    {
        return new self($this->value + $other->value);
    }

    /**
     * @return float
     */
    public function value(): float
    {
        return $this->value;
    }
}