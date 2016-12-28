<?php
/**
 * Created by PhpStorm.
 * User: mithila
 * Date: 17/12/2016
 * Time: 19:01
 */
?>
@extends('layouts.admin')

@section('content')
    <script type="text/javascript" src="/js/site/products.js"></script>
    @include('partials.admin-header',['page_title'=>'PRODUCTS'])

    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Add New Product</h5>

                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="fullscreen-link">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal">

                    <div class="col-lg-6">

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Product Name</label>
                            <div class="col-sm-8"><input type="text"   class="form-control" id="productName"></div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Cost Price</label>
                            <div class="col-sm-8"><input type="number" class="form-control" step="0.1" id="costPrice"></div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Max Retail Price</label>
                            <div class="col-sm-8"><input type="number" class="form-control" step="0.1" id="maxRetailPrice"></div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Min Retail Price</label>
                            <div class="col-sm-8"><input type="number" class="form-control" step="0.1" id="minRetailPrice"></div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Min Whole-Sale Price</label>
                            <div class="col-sm-8"><input type="number" class="form-control" step="0.1" id="minWhlslPrice"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Product Category</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="category">
                                    <option value="#">Please Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Product Group</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="productGroup">
                                    <option value="#">Please Select</option>
                                    @foreach($groups as $group)
                                        <option class="prod-groups" value="{{$group->id}}" data-cat="{{$group->productCategoryId}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Product Age</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="productAge">
                                    <option value="#">Please Select</option>
                                    <option value="0">Tender</option>
                                    <option value="1">Medium</option>
                                    <option value="2">Matured</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Product Code</label>
                            <div class="col-sm-8"><input type="text"   class="form-control" id="productCode"></div>
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenField">

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-5">
                            <button class="btn btn-white"   id="clearForm">Cancel</button>
                            <button class="btn btn-primary" id="submitProductsForm">Add Product</button>
                        </div>
                    </div>

                </form>

                <p class="left"> Please note that all fields must be filled before saving the product to the database </p>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Saved Products</h5>

                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="fullscreen-link">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Product Category</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="category-select">
                                    <option value="#">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Product Group</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="product-group-select">
                                    <option value="#">All</option>
                                    @foreach($groups as $group)
                                        <option class="product-groups" value="{{$group->id}}" data-cat="{{$group->productCategoryId}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <hr><br>

                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-3">
                        <div class="widget style1 lazur-bg">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-cube fa-2x"></i>
                                </div>
                                <div class="col-xs-10 text-right">
                                    <span> {{$product->groupName}} </span>
                                    <h4 class="font-bold">{{$product->name}} - {{$product->age}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

