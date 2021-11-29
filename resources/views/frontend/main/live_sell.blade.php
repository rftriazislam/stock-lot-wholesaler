@extends('frontend.master')
@section('content')
    <div class="ps-page--single">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Live sell</li>
                </ul>
            </div>
        </div>

        <div class="ps-section__content ddd2">
            <div class="row">
                @foreach ($fb as $item)

                    <div class=" col-md-3 col-sm-6 col-12 " style="height:295px">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <iframe
                                    src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/{{ $item['live'] }}/live"
                                    frameborder="0" controls="controls" allowfullscreen="" height="275px" autoplay="false">
                                </iframe>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
