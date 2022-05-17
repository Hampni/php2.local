<?php

namespace App\Models;

trait HasPriceTrait
{

    public int $price;

    /**
     * @return int // returns price of the object
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}
