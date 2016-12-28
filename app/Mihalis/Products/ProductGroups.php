<?php

namespace App\Mihalis\Products;

use Illuminate\Database\Eloquent\Model;

class ProductGroups extends Model
{
    protected $connection = 'mysql';
    protected $table = 'productGroup';
    protected $fillable = ['name','displayName','description','productCategoryId'];
    public $primaryKey = 'productGroupId';
}
