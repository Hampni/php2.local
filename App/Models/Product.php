<?php

namespace App\Models;

use App\Model;

class Product extends Model implements HasPriceInterface, HasWeightInterface
{
    protected const TABLE = 'product';

    public string $name;
    public float $weight;

    use HasPriceTrait;

    /**
     * @return float // returns weight of the object
     */
    public function getWeight(): float
    {
     return $this->weight;
    }


}