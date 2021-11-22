@extends('reseller.master')
@section('content')

    <div class="col-md-8 col-sm-8  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product Lists</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">



                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title">Sri No </th>
                                <th class="column-title">Image</th>
                                <th class="column-title">Name</th>
                                <th class="column-title">Qty</th>
                                <th class="column-title">Size</th>
                                <th class="column-title">Color</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($order->order_list as $item)


                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" ">{{ $loop->iteration }}</td>
                                    <td class=" "><img style=" height: 100px;width: 100px;"
                                            src="{{ asset('storage/merchant/product/main/small/') }}/{{ Hel::product($item['product_id'])->main_picture }}">
                                    </td>
                                    <td class=" ">{{ Hel::product($item['product_id'])->product_name }}</td>
                                    <td class=" ">{{ $item['qty'] }}</td>
                                    <td class=" ">{{ $item['size'] }}</td>
                                    <td class=" ">
                                        <p
                                            style="height:50px;width:50px;float:left;color:white; margin-right: 1px;background:{{ $item['color'] }}">

                                        </p>
                                        {{ $item['color'] }}
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


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
                            @if ($order->ship_details)
                                <button id="compose" class="btn btn-sm btn-success btn-block" type="button">Shipping
                                    Details</button>

                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                        </div>
                                        <div class="right">
                                            <h3>From</h3>
                                            </h3>
                                            <p>{{ $order->ship_details->ship_from }}</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                        </div>
                                        <div class="right">
                                            <h3>TO</h3>
                                            </h3>
                                            <p>{{ $order->ship_details->ship_to }}</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                        </div>
                                        <div class="right">
                                            <h3>Way</h3>
                                            </h3>
                                            <p>{{ $order->ship_details->ship_media_way }}</p>
                                        </div>
                                    </div>
                                </a>

                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                        </div>
                                        <div class="right">
                                            <h3>Delay</h3>
                                            </h3>
                                            <p>{{ $order->ship_details->ship_delay }}</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                                        </div>
                                        <div class="right">
                                            <h3>Details</h3>
                                            </h3>
                                            <p>{{ $order->ship_details->details }}</p>
                                        </div>
                                    </div>
                                </a>

                            @endif
                            <button id="compose" class="btn btn-sm btn-success btn-block" type="button">Reseller Delivery
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

@endsection
