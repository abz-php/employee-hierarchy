<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CatalogTrait;

class Position extends Model
{
    use CatalogTrait;

    protected $table = 'catalog_position';
}