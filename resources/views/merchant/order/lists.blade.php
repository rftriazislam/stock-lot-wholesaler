@extends('merchant.master')
@section('content')

    <div class="col-md-12 col-sm-12  ">
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
                                <th class="column-title">#TxID</th>
                                <th class="column-title">Reseller info </th>
                                <th class="column-title">Name </th>
                                <th class="column-title">Product List</th>
                                <th class="column-title">Delivery Details</th>
                                <th class="column-title">Total Amount</th>
                                <th class="column-title">Advanced Pay </th>
                                <th class="column-title">COD Amount</th>
                                <th class="column-title">Status </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $item)


                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" ">{{ $loop->iteration }}</td>
                                    <td class=" ">#{{ $item->tx_id }}</td>
                                    <td class=" "><a href="#">More Details</a></td>
                                    <td class=" ">{{ $item->user_info->name }}<i
                                            class="success fa fa-long-arrow-up"></i></td>
                                    <td class=" "><a
                                            href="{{ route('merchant.order.single', [$item->id]) }}">Product
                                            Lists</a></td>
                                    <td class=" "><a style="color: blueviolet"
                                            href="{{ route('merchant.order.single', [$item->id]) }}">Delivery Details</a>
                                    </td>

                                    <td class=" ">{{ $item->total_amount - $item->total_service_charge }}
                                    </td>
                                    <td class=" ">{{ $item->amount - $item->total_service_charge }}</td>
                                    <td class=" ">{{ $item->total_amount - $item->amount }}</td>


                                    <td class=" ">

                                        @if ($item->status == 0)
                                            <a class="btn btn-info" style="color: white">Panding</a>

                                        @elseif($item->status == 1)
                                            <a href="" class="btn btn-success" style="color: white">Checking</a>
                                        @else
                                            <a class="btn btn-danger" style="color: white">Complete</a>
                                        @endif

                                    </td>
                                    <td class="last">
                                        <a class="btn btn-success" style="color: white">Shipping Charge</a>
                                        <a class="btn btn-danger" style="color: white">Cancel</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $orders->links() }}
            </div>
        </div>
    @endsection
