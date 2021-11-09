@extends('admin.master')
@section('content')

    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Merchant Lists</h2>
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
                                <th class="column-title">#ID</th>
                                <th class="column-title">Country </th>
                                <th class="column-title">State</th>
                                <th class="column-title">Currency </th>
                                <th class="column-title">Name</th>
                                <th class="column-title">Email</th>
                                <th class="column-title">Phone</th>
                                <th class="column-title">Address</th>
                                <th class="column-title">Image</th>
                                <th class="column-title">Status </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($merchants as $merchant)


                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" ">{{ $loop->iteration }}</td>
                                    <td class=" ">#{{ $merchant->id }}</td>
                                    <td class=" ">{{ $merchant->country }}</td>
                                    <td class=" ">{{ $merchant->State }}<i
                                            class="success fa fa-long-arrow-up"></i></td>
                                    <td class=" ">{{ $merchant->currency }}</td>
                                    <td class=" ">{{ $merchant->name }}</td>
                                    <td class=" ">{{ $merchant->email }}</td>
                                    <td class=" ">{{ $merchant->phone }}</td>
                                    <td class=" ">{{ $merchant->address }}</td>
                                    <td class=" ">{{ $merchant->image }}</td>

                                    <td class=" ">

                                        @if ($merchant->status == 1)
                                            <a href="" class="btn btn-success">Published</a>
                                        @else
                                            <a href="" class="btn btn-danger">Unpublished</a>
                                        @endif

                                    </td>
                                    <td class="last">

                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    @endsection
