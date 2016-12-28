<?php
/**
 * Created by PhpStorm.
 * User: mithila
 * Date: 19/12/2016
 * Time: 08:45
 */

namespace App\Mihalis\Products;



class ProductsRepository  implements ProductsInterface
{

    private $products;
    private $productsView;
    private $productGroups;
    private $productCategories;

    public function __construct(Products $products, ProductGroups $productGroups, ProductCategories $productCategories, ProductsView $productsView)
    {
        $this->products = $products;
        $this->productsView = $productsView;
        $this->productGroups = $productGroups;
        $this->productCategories = $productCategories;
    }

    public function getAllProducts()
    {
        return $this->productsView->all();
    }

    public function getAllProductGroups()
    {
        return $this->productGroups->all();
    }

    public function getAllProductCategories()
    {
        return $this->productCategories->all();
    }

    public function addProduct($data)
    {
        $values = $data;
        unset($values['_token']);
        $this->products->updateOrCreate($values,$values);
    }

    public function addGroup($data)
    {
        $values = $data;
        unset($values['_token']);
        $this->productGroups->updateOrCreate($values,$values);
    }

}