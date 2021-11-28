@extends('frontend.master')
@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a>Pre Order</a></li>

                </ul>
            </div>
        </div>
        @foreach ($hotdeals as $hot_item)
            <div class="ps-deal-hot" style="padding: 15px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--deal-hot" data-mh="dealhot">
                                <div class="ps-block__header">
                                    <h3>Pre Order</h3>
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

                                        <div class="ps-product--detail ps-product--hot-deal">
                                            <div class="ps-product__header">
                                                <div class="ps-product__thumbnail" data-vertical="true">
                                                    <figure>
                                                        <div class="ps-wrapper">
                                                            <div class="ps-product__gallery" data-arrow="true">
                                                                <div class="item">
                                                                    <a
                                                                        href="{{ asset('storage') }}/merchant/product/main/big/{{ $hot_item->product->main_picture }}"><img
                                                                            src="{{ asset('storage') }}/merchant/product/main/small/{{ $hot_item->product->main_picture }}"
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
                                                                src="{{ asset('storage') }}/merchant/product/main/small/{{ $hot_item->product->main_picture }}"
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
                                                            {{ $hot_item->product->price + $hot_item->product->service_charge }}
                                                            <del>{{ $hot_item->product->min_retail_price }}
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

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <aside class="widget widget_best-sale" data-mh="dealhot">
                                <h3 class="widget-title" style="margin-bottom:0px">Top 20 Best Seller</h3>
                                <div class="widget__content">
                                    <div class="owl-slider" data-owl-auto="true" data-owl-loop="true"
                                        data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false"
                                        data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1"
                                        data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">

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
                                                            {{ $topsell->price + $topsell->service_charge }}</p>
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
                                                            {{ $topsell2->price + $topsell2->service_charge }}</p>
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
        @endforeach

    </div>
@endsection
