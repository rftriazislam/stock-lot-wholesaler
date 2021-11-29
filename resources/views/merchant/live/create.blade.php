@extends('merchant.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <p>Live Video From Facebook</p>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Live Video From Facebook</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="demo-form2" action="@if ($facebook){{ route('merchant.update.live') }} @else {{ route('merchant.save.live') }}@endif" method="POST" data-parsley-validate
                            class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Facebook Page
                                    UserName
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="name"
                                        @if ($facebook) value="{{ $facebook->page_name }}" @else @endif placeholder="stocklot2020" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                    Warrning
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    Only Facebook Page Live Video can support .Give the valid username
                                    <h4> Note: https://www.facebook.com/<b style="color:green">stocklot2020</b></h4>
                                </div>

                            </div>


                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-danger" type="reset">Cancel</button>

                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Live Video Facebook</h2>

                    </div>

                    <div class="x_content">

                        @if ($facebook)
                            <iframe
                                src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/{{ $facebook->page_name }}/live"
                                frameborder="0" height="260px">
                            </iframe>

                        @endif

                        <br>
                        <h1>Go to live Then check </h1>
                        <a class="btn btn-info" href="{{ route('live.sell') }}">StockLot LIVE</a>
                    </div>
                </div>
            </div>

        </div>
    @endsection
