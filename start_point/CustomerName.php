<?php
declare(strict_types=1);

class CustomerName
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string  $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}