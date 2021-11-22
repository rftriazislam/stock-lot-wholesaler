@extends('merchant.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <p>Form Elements</p>
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
            <div class="col-md-8 col-sm-8 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Order ID {{ $order->tx_id }}</h2>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br />
                        <form id="demo-form2" action="{{ route('merchant.save.shipping') }}" method="POST"
                            data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf


                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Ship TO
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="ship_to"
                                        value="@foreach ($order->delivery_details as $item) {{ $item['address'] }} {{ $item['state'] . ',' . $item['country'] }} @endforeach" class="form-control " placeholder="Desi Shop">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Ship
                                    From
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="image" name="ship_from" required="required"
                                        class="form-control image file pb-34 ">
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Ship
                                    Cost
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="first-name" required="required" name="ship_cost"
                                        class="form-control " placeholder="10">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Ship
                                    Way/Media
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="ship_media_way"
                                        class="form-control " placeholder="BUS , TRAIN , LOUNCE, AIR ETC.">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Ship
                                    Delay
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="ship_delay"
                                        class="form-control " placeholder="7 days">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label btn col-md-3 col-sm-3 label-align" for="first-name">Ship
                                    Details
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" name="details"
                                        class="form-control " placeholder="product ">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-round  btn-danger" type="reset">Cancel</button>

                                    <button type="submit" class="btn btn-round  btn-success">Save</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Delivery Details</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div>

                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12 mail_list_column">
                                    <button id="compose" class="btn btn-sm btn-success btn-block" type="button">Delivery
                                        Details</button>
                                    @foreach ($order->delivery_details as $item)


                                        <a href="#">
                                            <div class="mail_list">
                                                <div class="left">
                                                    <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                                </div>
                                                <div class="right">
                                                    <h3>Name</h3>
                                                    </h3>
                                                    <p>{{ $item['name'] }}</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="mail_list">
                                                <div class="left">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="right">
                                                    <h3>Phone</h3>
                                                    <p><span class="badge">To</span>
                                                        {{ $item['phone'] }}</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="mail_list">
                                                <div class="left">
                                                    <i class="fa fa-circle-o"></i><i class="fa fa-paperclip"></i>
                                                </div>
                                                <div class="right">
                                                    <h3>Country</h3>
                                                    <p><span class="badge">CC</span> {{ $item['country'] }}</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="mail_list">
                                                <div class="left">
                                                    <i class="fa fa-paperclip"></i>
                                                </div>
                                                <div class="right">
                                                    <h3>State/District</h3>
                                                    <p> {{ $item['state'] }}</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="mail_list">
                                                <div class="left">
                                                    .
                                                </div>
                                                <div class="right">
                                                    <h3>Delivery Address</h3>
                                                    <p> {{ $item['address'] }}</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="mail_list">
                                                <div class="left">
                                                    .
                                                </div>
                                                <div class="right">
                                                    <h3>Details</h3>
                                                    <p> {{ $item['note'] }}</p>
                                                </div>
                                            </div>
                                        </a>

                                    @endforeach

                                </div>
                                <!-- /MAIL LIST -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
