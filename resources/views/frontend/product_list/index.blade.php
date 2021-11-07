@extends('frontend.layout.app')
@section('content')
    
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Concept - Bootstrap 4 Admin Dashboard Template </h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">E-coommerce</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Concept - Bootstrap 4 Admin Dashboard Template</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="row">
                    @foreach ($mall_items as $mall_item)
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="product-thumbnail">
                            <div class="product-img-head">
                                <div class="product-img">
                                    
                                    <img src="{{$mall_item->photo[0] ?? asset('img/detail_1_1.png')}}" alt="" class="img-fluid"></div>
                                @if($mall_item->is_new)
                                <div class="ribbons"></div>
                                <div class="ribbons-text">New</div>
                                @endif
                                @if($mall_item->is_hot)
                                <div class="ribbons bg-danger"></div>
                                <div class="ribbons-text">Hot</div>
                                @endif
                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title">{{$mall_item->infoTw ? $mall_item->infoTw->name : $mall_item->infoEn->name}} {{$mall_item->code}}</h3>
                                    <div class="product-rating d-inline-block">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="product-price">${{$mall_item->infoTw->price}}</div>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                    <a href="#" class="btn btn-outline-light">Details</a>
                                    <a href="#" class="btn btn-outline-light"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="product-sidebar">
                    <div class="product-sidebar-widget">
                        <h4 class="mb-0">E-Commerce Filter</h4>
                    </div>
                    <div class="product-sidebar-widget">
                        <h4 class="product-sidebar-widget-title">Category</h4>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-1">
                            <label class="custom-control-label" for="cat-1">Categories #1</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-2">
                            <label class="custom-control-label" for="cat-2">Categories #2</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-3">
                            <label class="custom-control-label" for="cat-3">Categories #3</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-4">
                            <label class="custom-control-label" for="cat-4">Categories #4</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-5">
                            <label class="custom-control-label" for="cat-5">Categories #5</label>
                        </div>
                    </div>
                    <div class="product-sidebar-widget">
                        <h4 class="product-sidebar-widget-title">Size</h4>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">Small</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">Medium</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">Large</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">Extra Large</label>
                        </div>
                    </div>
                    <div class="product-sidebar-widget">
                        <h4 class="product-sidebar-widget-title">Brand</h4>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-1">
                            <label class="custom-control-label" for="brand-1">Brand Name #1</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-2">
                            <label class="custom-control-label" for="brand-2">Brand Name #2</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-3">
                            <label class="custom-control-label" for="brand-3">Brand Name #3</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brand-4">
                            <label class="custom-control-label" for="brand-4">Brand Name #4</label>
                        </div>
                    </div>
                    <div class="product-sidebar-widget">
                        <h4 class="product-sidebar-widget-title">Color</h4>
                        <div class="custom-control custom-radio custom-color-blue ">
                            <input type="radio" id="color-1" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="color-1">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-color-red ">
                            <input type="radio" id="color-2" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="color-2">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-color-yellow ">
                            <input type="radio" id="color-3" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="color-3">Yellow</label>
                        </div>
                        <div class="custom-control custom-radio custom-color-black ">
                            <input type="radio" id="color-4" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="color-4">Black</label>
                        </div>
                    </div>
                    <div class="product-sidebar-widget">
                        <h4 class="product-sidebar-widget-title">Price</h4>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$$</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$$$</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$$$$</label>
                        </div>
                    </div>
                    <div class="product-sidebar-widget">
                        <a href="#" class="btn btn-outline-light">Reset Filter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>

@endsection
