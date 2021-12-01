@extends('frontend.master')

@section('css')
    <style>
        @media (min-width: 1200px) {
            .hidee {
                display: none;
            }
        }

        .icon-chevron-right {
            font-size: 35px;
        }

        .icon-chevron-left {
            font-size: 35px;
        }

        .zoom:hover {
            transform: scale(1.05);
        }

    </style>
@endsection

@section('content')




    <div id="homepage-6">

        <div class="ps-home-banner">
            <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
                data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">

                @foreach ($slider as $item)
                    <div class="ps-banner--market-1" data-background="{{ asset('storage') }}/slider/{{ $item->image }}">
                        <img src="{{ asset('storage') }}/slider/{{ $item->image }}" alt="">

                    </div>
                @endforeach
            </div>
        </div>
        <div class="ps-site-features">
            <div class="container">
                <div class="ps-block--site-features ps-block--site-features-2">
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-rocket"></i></div>
                        <div class="ps-block__right">
                            <a href="{{ route('live.sell') }}">
                                <h4>Live Sell</h4>
                            </a>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <a href="{{ route('pre.order') }}">
                                <h4>Pre Order</h4>
                            </a>

                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                        <div class="ps-block__right">
                            <h4>On-Demand Product</h4>

                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-rocket"></i></div>
                        <div class="ps-block__right">
                            <h4>Cash on Delivery</h4>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="ps-promotions">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 "><a class="ps-collection"
                            href="shop-default.html"><img src="{{ asset('frontend') }}/img/b3.jpg" alt=""></a>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 "><a class="ps-collection"
                            href="shop-default.html"><img src="{{ asset('frontend') }}/img/b2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-deal-hot">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--deal-hot" data-mh="dealhot">
                            <div class="ps-block__header">
                                <h3>Deal hot today</h3>
                                <div class="ps-block__navigation"><a class="ps-carousel__prev"
                                        href=".ps-carousel--deal-hot"><i class="icon-chevron-left"></i></a><a
                                        class="ps-carousel__next" href=".ps-carousel--deal-hot"><i
                                            class="icon-chevron-right"></i></a></div>
                            </div>
                            <div class="ps-product__content">
                                <div class="ps-carousel--deal-hot ps-carousel--deal-hot owl-slider" data-owl-auto="true"
                                    data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false"
                                    data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
                                    data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                                    data-owl-mousedrag="on">
                                    @foreach ($hotdeals as $hot_item)
                                        <div class="ps-product--detail ps-product--hot-deal">
                                            <div class="ps-product__header">
                                                <div class="ps-product__thumbnail" data-vertical="true">
                                                    <figure>
                                                        <div class="ps-wrapper">
                                                            <div class="ps-product__gallery" data-arrow="true">
                                                                <div class="item">
                                                                    <a
                                                                        href="{{ asset('storage') }}/merchant/product/main/big/{{ $hot_item->product->main_picture }}"><img
                                                                            src="{{ asset('storage') }}/merchant/product/main/medium/{{ $hot_item->product->main_picture }}"
                                                                            alt="">
                                                                    </a>
                                                                </div>

                                                                @if ($hot_item->product->files)
                                                                    @foreach ($hot_item->product->files as $item)

                                                                        <div class="item"><a
                                                                                href="{{ asset('storage') }}/merchant/product/files/small/{{ $item['image'] }}"><img
                                                                                    src="{{ asset('storage') }}/merchant/product/files/small/{{ $item['image'] }}"
                                                                                    alt=""></a></div>
                                                                    @endforeach
                                                                @endif

                                                            </div>
                                                            <div class="ps-product__badge"><span>Save
                                                                    <br>{{ Hel::discount_percent($hot_item->product->id, $hot_item->product->user_id) }}%</span>

                                                            </div>
                                                        </div>
                                                    </figure>
                                                    <div class="ps-product__variants" data-item="4" data-md="3" data-sm="3"
                                                        data-arrow="false">
                                                        <div class="item"><img
                                                                src="{{ asset('storage') }}/merchant/product/main/medium/{{ $hot_item->product->main_picture }}"
                                                                alt=""></div>
                                                        @if ($hot_item->product->files)
                                                            @foreach ($hot_item->product->files as $item)

                                                                <div class="item"><img
                                                                        src="{{ asset('storage') }}/merchant/product/files/small/{{ $item['image'] }}"
                                                                        alt=""></div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="ps-product__info">
                                                    <a
                                                        href="{{ route('product.view', [$hot_item->product->id, $hot_item->product->slug]) }}">
                                                        <h5>{{ $hot_item->product->subcategory->name }}</h5>
                                                        <h3 class="ps-product__name">
                                                            {{ $hot_item->product->product_name }}</h3>
                                                    </a>
                                                    <div class="ps-product__meta">
                                                        <h4 class="ps-product__price sale">
                                                            {{ Currency::mc('BDT', $hot_item->product->price + $hot_item->product->service_charge) }}
                                                            <del>{{ Currency::mc('BDT', $hot_item->product->min_retail_price) }}
                                                            </del>
                                                        </h4>
                                                        <div class="ps-product__rating">
                                                            <select class="ps-rating" data-read-only="true">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><span>(1 review)</span>
                                                        </div>
                                                        <div class="ps-product__specification">
                                                            <p>Status:<strong class="in-stock"> In
                                                                    Stock</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="ps-product__expires">
                                                        <p>Expires In</p>
                                                        {{-- December 21, 2021 23:00:00 --}}
                                                        <ul class="ps-countdown"
                                                            data-time="{{ $hot_item->expried_time }}">
                                                            <li><span class="days"></span>
                                                                <p>Days</p>
                                                            </li>
                                                            <li><span class="hours"></span>
                                                                <p>Hours</p>
                                                            </li>
                                                            <li><span class="minutes"></span>
                                                                <p>Minutes</p>
                                                            </li>
                                                            <li><span class="seconds"></span>
                                                                <p>Seconds</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="ps-product__processs-bar">
                                                        <div class="ps-progress"
                                                            data-value="{{ ($hot_item->product->sell_count * 100) / ($hot_item->product->sell_count + $hot_item->product->stock) }}">
                                                            <span class="ps-progress__value"></span>
                                                        </div>
                                                        <p><strong>{{ $hot_item->product->sell_count }}/{{ $hot_item->product->stock }}</strong>
                                                            Sold</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <aside class="widget widget_best-sale" data-mh="dealhot">
                            <h3 class="widget-title" style="margin-bottom:0px">Top 20 Best Seller</h3>
                            <div class="widget__content">
                                <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
                                    data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="1"
                                    data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
                                    data-owl-duration="1000" data-owl-mousedrag="on">

                                    <div class="ps-product-group">
                                        @foreach ($top_sells->take(6) as $topsell)
                                            <div class="ps-product--horizontal">
                                                <div class="ps-product__thumbnail"><a
                                                        href="{{ route('product.view', [$topsell->id, $topsell->slug]) }}"><img
                                                            src="{{ asset('storage') }}/merchant/product/main/small/{{ $topsell->main_picture }}"
                                                            alt=""></a></div>
                                                <div class="ps-product__content"><a class="ps-product__title"
                                                        href="{{ route('product.view', [$topsell->id, $topsell->slug]) }}">{{ substr($topsell->product_name, 0, 15) }}...</a>
                                                    <div class="ps-product__rating">
                                                        <select class="ps-rating" data-read-only="true">
                                                            <option value="1">1</option>
                                                            <option value="1">2</option>
                                                            <option value="1">3</option>
                                                            <option value="1">4</option>
                                                            <option value="2">5</option>
                                                        </select><span>01</span>
                                                    </div>
                                                    <p class="ps-product__price sale">
                                                        {{ Currency::mc('BDT', $topsell->price + $topsell->service_charge) }}

                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="ps-product-group">
                                        @foreach ($top_sells->skip(6)->take(6) as $topsell2)
                                            <div class="ps-product--horizontal">
                                                <div class="ps-product__thumbnail"><a
                                                        href="{{ route('product.view', [$topsell2->id, $topsell2->slug]) }}"><img
                                                            src="{{ asset('storage') }}/merchant/product/main/small/{{ $topsell2->main_picture }}"
                                                            alt=""></a></div>
                                                <div class="ps-product__content"><a class="ps-product__title"
                                                        href="{{ route('product.view', [$topsell2->id, $topsell2->slug]) }}">{{ substr($topsell2->product_name, 0, 15) }}...</a>
                                                    <div class="ps-product__rating">
                                                        <select class="ps-rating" data-read-only="true">
                                                            <option value="1">1</option>
                                                            <option value="1">2</option>
                                                            <option value="1">3</option>
                                                            <option value="1">4</option>
                                                            <option value="2">5</option>
                                                        </select><span>02</span>
                                                    </div>
                                                    <p class="ps-product__price sale">
                                                        {{ Currency::mc('BDT', $topsell2->price + $topsell2->service_charge) }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-top-categories">
            <div class="container">
                <h3>Top categories of the month</h3>
                <div class="row">
                    @foreach ($categories as $item)
                        <div class=" col-lg-3 col-md-4 col-sm-4 col-6 ">
                            <div class="p_35 ps-block--category" style="padding: 3.5px"><a class="ps-block__overlay"
                                    href="{{ route('product.list.category', [$item->id]) }}"></a><img
                                    src="{{ asset('storage') }}/category/big/{{ $item->image }}" alt="">
                                <p>{{ $item->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="ps-categories-box">
            <div class="container">

                @foreach ($product as $item)
                    @if ($item->subcategory_count)

                        <div class="ps-block--categories-box">
                            <div class="ps-block__header">
                                <h3>{{ $item->name }}</h3>
                                <ul>
                                    <li><a href="shop-default.html">New Arrivals</a></li>
                                    <li><a href="shop-default.html">Best Seller</a></li>
                                </ul>
                            </div>
                            <div class="ps-block__content">
                                <div class="ps-block__banner">
                                    <img src="{{ asset('storage') }}/category/big/{{ $item->image }}" alt="">
                                </div> @php
                                    $i = 0;
                                @endphp
                                @foreach ($item->subcategory as $subitem)

                                    @if ($subitem->merchantproduct_count && $i < 8)
                                        <div @if ($i == 7) class="ps-block__item hidee zoom" @else class="ps-block__item zoom"  @endif
                                            style="position: relative;padding:3px;border: 1px solid transparent; box-shadow: 0 0 5px rgb(0 0 0 / 15%);">
                                            <a class="ps-block__overlay "
                                                href="{{ route('product.list.subcategory', [$subitem->id]) }}"></a>

                                            <img style="max-height:225px"
                                                src="{{ asset('storage') }}/subcategory/{{ $subitem->image }}" alt="">

                                            <p class="ti">{{ $subitem->name }}<br><span>Item
                                                    {{ $subitem->merchantproduct_count }}</span> </p>
                                        </div>
                                        @php
                                            $i = $i + 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="ps-section__content ddd1" style="background-color: #ffffff;">
                            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
                                data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
                                data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2"
                                data-owl-item-lg="3" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

                                @foreach ($item->cateproduct as $subitem)

                                    <div class="ps-product">
                                        <div class="ps-product__thumbnail"><a
                                                href="{{ route('product.view', [$subitem->id, $subitem->slug]) }}"><img
                                                    class="zoomm"
                                                    src="{{ asset('storage') }}/merchant/product/main/small/{{ $subitem->main_picture }}"
                                                    alt="" /></a>
                                            <ul class="ps-product__actions">
                                                <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal"
                                                        data-target="#product-quickview"><i class="icon-eye"></i></a>
                                                </li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="Add to Whishlist"><i class="icon-heart"></i></a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="ps-product__container"><a class="ps-product__vendor"
                                                href="{{ route('product.view', [$subitem->id, $subitem->slug]) }}"></a>
                                            <div class="ps-product_g_content ti"><a class="ps-product__title"
                                                    href="{{ route('product.view', [$subitem->id, $subitem->slug]) }}">{{ $subitem->product_name }}
                                                </a>
                                                <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>02</span>
                                                </div>
                                                <p class="ps-product__price sale">
                                                    {{ Currency::mc('BDT', $subitem->price + $subitem->service_charge) }}
                                                    <del>{{ Currency::mc('BDT', $subitem->min_retail_price) }}
                                                    </del>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                @endforeach

                            </div>
                        </div>

                        <div class="ps-section__content ddd2">
                            <div class="row">
                                @foreach ($item->cateproduct as $subitem)

                                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12 ">
                                        <div class="ps-product">
                                            <div class="ps-product__thumbnail"><a
                                                    href="{{ route('product.view', [$subitem->id, $subitem->slug]) }}"><img
                                                        class="zokomm"
                                                        src="{{ asset('storage') }}/merchant/product/main/big/{{ $subitem->main_picture }}"
                                                        alt="" /></a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                    <li><a href="#" data-placement="top" title="Quick View"
                                                            data-toggle="modal" data-target="#product-quickview"><i
                                                                class="icon-eye"></i></a>
                                                    </li>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="Add to Whishlist"><i class="icon-heart"></i></a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="ps-product__container"><a class="ps-product__vendor ti"
                                                    href="{{ route('shop.view', [$subitem->user_id, Hel::shop_info($subitem->user_id)->name]) }}">{{ Hel::shop_info($subitem->user_id)->name }}</a>
                                                <div class="ps-product_g_content ti"><a class="ps-product__title"
                                                        href="{{ route('product.view', [$subitem->id, $subitem->slug]) }}">{{ $subitem->product_name }}
                                                    </a>
                                                    <div class="ps-product__rating">
                                                        <select class="ps-rating" data-read-only="true">
                                                            <option value="1">1</option>
                                                            <option value="1">2</option>
                                                            <option value="1">3</option>
                                                            <option value="1">4</option>
                                                            <option value="2">5</option>
                                                        </select><span>02</span>
                                                    </div>
                                                    <p class="ps-product__price sale">
                                                        {{ Currency::mc('BDT', $subitem->price + $subitem->service_charge) }}
                                                        <del>{{ Currency::mc('BDT', $subitem->min_retail_price) }}
                                                        </del>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @endif
                @endforeach




            </div>
        </div>



    </div>


    <script src="{{ asset('frontend') }}/js/custom/custom.js"></script>

    @include('frontend.include.loader')


@endsection
