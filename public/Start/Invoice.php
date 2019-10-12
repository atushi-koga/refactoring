<?php
declare(strict_types=1);

namespace App\Start;

interface Invoice
{
    public function statement(): string;
}