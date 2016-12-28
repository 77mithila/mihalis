<?php

namespace App\Mihalis\Products;

use Illuminate\Database\Eloquent\Model;

class ProductsView extends Model
{
    protected $connection = 'mysql';
    protected $table = 'products';
    public $primaryKey = 'productId';
}
