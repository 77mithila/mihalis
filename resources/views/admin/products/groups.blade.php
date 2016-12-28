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
    @include('partials.admin-header',['page_title'=>'PRODUCT GROUPS'])

    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Add New Product Group</h5>

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
                            <label class="col-sm-4 control-label">Group Name</label>
                            <div class="col-sm-8"><input type="text"   class="form-control" id="groupName"></div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Display Name</label>
                            <div class="col-sm-8"><input type="text"   class="form-control" id="displayName"></div>
                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Description</label>
                            <div class="col-sm-8"><input type="text"   class="form-control" id="description"></div>
                        </div>

                        <div class="form-group left">
                            <label class="col-sm-4 control-label">Product Category</label>
                            <div class="col-sm-8">
                                <select class="form-control m-b" id="categoryId">
                                    <option value="#">Please Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenField">

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-5">
                            <button class="btn btn-white"   id="clearForm">Cancel</button>
                            <button class="btn btn-primary" id="submitGroupsForm">Add Group</button>
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
                <h5>Saved Product Groups</h5>

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

                <div class="form-group left">
                    <label class="col-sm-4 control-label">Product Category</label>
                    <div class="col-sm-8">
                        <select class="form-control m-b" id="category">
                            <option value="#">All</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr><br>

                <div class="row">
                    @foreach($groups as $group)
                    <div class="col-lg-3 prod-groups" data-cat="{{$group->productCategoryId}}">
                        <div class="widget style1 navy-bg">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-leaf fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <span>  </span>
                                    <h2>{{$group->name}}</h2>
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

