<?php

namespace App\Mihalis\Products;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $connection = 'mysql';
    protected $table = 'product';
    protected $fillable = ['name', 'code','ageId','costPrice','maxRetailPrice','minRetailPrice','minWhlslPrice','productCategoryId','productGroupId'  ];
    public $primaryKey = 'productId';
}
