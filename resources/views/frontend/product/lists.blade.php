@extends('frontend.master')

@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Products</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">

                            @foreach (HelpCat::category_list() as $item)
                                <li class="current-menu-item menu-item-has-children"><a
                                        href="{{ route('product.list.category', [$item->id]) }}">{{ $item->name }}</a><span
                                        class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                        @forelse ($item->subcategory as $subcate)
                                            <li class="current-menu-item "><a
                                                    href="{{ route('product.list.subcategory', [$subcate->id]) }}">{{ $subcate->name }}
                                                    ({{ Hel::product_sub_count($subcate->id) }})</a>
                                            </li>
                                        @empty
                                            <li><a>No subcategory</a>
                                            </li>
                                        @endforelse


                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">BY </h4>
                        <form class="ps-form--widget-search" action="do_action" method="get">
                            <input class="form-control" type="text" placeholder="">
                            <button><i class="icon-magnifier"></i></button>
                        </form>

                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div id="nonlinear"></div>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value">$<span
                                        class="ps-slider__min"></span></span>-<span class="ps-slider__value">$<span
                                        class="ps-slider__max"></span></span></p>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-1" name="review">
                                <label for="review-1"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i
                                            class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i
                                            class="fa fa-star rate"></i></span><small>(13)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-2" name="review">
                                <label for="review-2"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i
                                            class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i
                                            class="fa fa-star"></i></span><small>(13)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-3" name="review">
                                <label for="review-3"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i
                                            class="fa fa-star rate"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i></span><small>(5)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-4" name="review">
                                <label for="review-4"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i></span><small>(5)</small></label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-5" name="review">
                                <label for="review-5"><span><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i></span><small>(1)</small></label>
                            </div>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Color</h4>
                            <div class="ps-checkbox ps-checkbox--color color-1 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-1" name="size">
                                <label for="color-1"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-2 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-2" name="size">
                                <label for="color-2"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-3 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-3" name="size">
                                <label for="color-3"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-4 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-4" name="size">
                                <label for="color-4"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-5 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-5" name="size">
                                <label for="color-5"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-6 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-6" name="size">
                                <label for="color-6"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-7 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-7" name="size">
                                <label for="color-7"></label>
                            </div>
                            <div class="ps-checkbox ps-checkbox--color color-8 ps-checkbox--inline">
                                <input class="form-control" type="checkbox" id="color-8" name="size">
                                <label for="color-8"></label>
                            </div>
                        </figure>
                        <figure class="sizes">
                            <h4 class="widget-title">BY SIZE</h4><a href="#">L</a><a href="#">M</a><a href="#">S</a><a
                                href="#">XL</a>
                        </figure>
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><strong> 36</strong> Products found</p>
                            <div class="ps-shopping__actions">
                                <select class="ps-select" data-placeholder="Sort Items">
                                    <option>Sort by latest</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                                <div class="ps-shopping__view">
                                    <p>View</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a>
                                        </li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        @forelse ($products as $item)


                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                <div class="ps-product">
                                                    <div class="ps-product__thumbnail"><a
                                                            href="{{ route('product.view', [$item->id, $item->slug]) }}"><img
                                                                class="zoomm"
                                                                src="{{ asset('storage') }}/merchant/product/main/small/{{ $item->main_picture }}"
                                                                alt=""></a>
                                                        <ul class="ps-product__actions">
                                                            <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                                    title="Add To Cart"><i class="icon-bag2"></i></a>
                                                            </li>
                                                            <li><a href="#" data-placement="top" title="Quick View"
                                                                    data-toggle="modal" data-target="#product-quickview"><i
                                                                        class="icon-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                                    title="Add to Whishlist"><i
                                                                        class="icon-heart"></i></a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <div class="ps-product__container"><a class="ps-product__vendor"
                                                            href="#"> {{ Hel::shop_info($item->user_id)->name }}</a>
                                                        <div class="ps-product_g_content ti"><a class="ps-product__title"
                                                                href="product-default.html">{{ $item->product_name }}</a>
                                                            <p class="ps-product__price">
                                                                {{ $item->price + $item->service_charge }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                <h4 style="text-align: center">Not Found</h4>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ps-tab" id="tab-2">
                                <div class="ps-shopping-product">
                                    @forelse ($products as $item)
                                        <div class="ps-product ps-product--wide">
                                            <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                                        class="zoomm"
                                                        src="{{ asset('storage') }}/merchant/product/main/small/{{ $item->main_picture }}"></a>
                                            </div>
                                            <div class="ps-product__container">
                                                <div class="ps-product__content"><a class="ps-product__title"
                                                        href="product-default.html">{{ $item->product_name }}</a>
                                                    <p class="ps-product__vendor">Sold by:<a href="#">
                                                            {{ Hel::shop_info($item->user_id)->name }}</a>
                                                    </p>
                                                    <ul class="ps-product__desc">
                                                        <li> Unrestrained and portable active stereo speaker</li>
                                                        <li> Free from the confines of wires and chords</li>
                                                        <li> 20 hours of portable capabilities</li>
                                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                                        <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__shopping">
                                                    <p class="ps-product__price">
                                                        {{ $item->price + $item->service_charge }}</p><a
                                                        class="ps-btn" href="#">Add to cart</a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
