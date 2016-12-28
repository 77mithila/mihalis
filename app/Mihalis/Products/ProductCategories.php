<?php

namespace App\Mihalis\Products;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $connection = 'mysql';
    protected $table = 'productCategory';
    public $primaryKey = 'productCategoryId';
}
