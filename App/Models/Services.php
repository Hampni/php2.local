<?php

namespace App\Models;

use App\Model;

class Services extends Model implements HasPriceInterface
{
    protected const TABLE = 'services';

    public string $name;

    use HasPriceTrait;
}