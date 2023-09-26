<?php


namespace App\Services;


class CostCalculator
{
    private $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function calc(int $views): int
    {
        return floor($this->price * ($views / 1000));
    }
}
