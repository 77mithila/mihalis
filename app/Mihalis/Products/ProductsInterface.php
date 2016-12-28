<?php
/**
 * Created by PhpStorm.
 * User: mithila
 * Date: 19/12/2016
 * Time: 08:43
 */

namespace App\Mihalis\Products;



interface ProductsInterface
{
    public function getAllProducts();
    public function getAllProductGroups();
    public function getAllProductCategories();
    public function addProduct($data);
    public function addGroup($data);
}