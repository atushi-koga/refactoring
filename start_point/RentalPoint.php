<?php
declare(strict_types=1);

class RentalPoint
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function plus(self $other): self
    {
        return new self($this->value + $other->value);
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}