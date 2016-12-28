<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mihalis\Products\ProductsInterface;

class ProductController extends Controller
{

    private $productsRepo;

    public function __construct(ProductsInterface $productsInterface)
    {
        $this->productsRepo = $productsInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsView()
    {
        $groups = $this->productsRepo->getAllProductGroups();
        $products = $this->productsRepo->getAllProducts();
        $categories = $this->productsRepo->getAllProductCategories();
        return view('admin.products.products', compact('products','groups','categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function groupsView()
    {
        $groups = $this->productsRepo->getAllProductGroups();
        $categories = $this->productsRepo->getAllProductCategories();
        return view('admin.products.groups', compact('groups','categories'));
    }

    public function addProduct(Request $request)
    {
        $data = $request->all();
        $this->productsRepo->addProduct($data);
        return 'success';
    }

    public function addGroup(Request $request)
    {
        $data = $request->all();
        $this->productsRepo->addGroup($data);
        return 'success';
    }


}
