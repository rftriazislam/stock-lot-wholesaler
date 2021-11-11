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
                                <th class="column-title">#ID</th>
                                <th class="column-title">Category </th>
                                <th class="column-title">Subcategory </th>
                                <th class="column-title">Name</th>
                                <th class="column-title">P.ID</th>
                                <th class="column-title">Details</th>
                                <th class="column-title">Size</th>
                                <th class="column-title">Unit</th>
                                <th class="column-title">Color</th>
                                <th class="column-title">Stock</th>
                                <th class="column-title">Mini Order</th>
                                <th class="column-title">Order Note</th>
                                <th class="column-title">Price</th>
                                <th class="column-title">Image</th>
                                <th class="column-title">Video Link</th>
                                <th class="column-title">Status </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $item)


                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" ">{{ $loop->iteration }}</td>
                                    <td class=" ">#{{ $item->id }}</td>
                                    <td class=" ">{{ $item->category->name }}</td>
                                    <td class=" ">{{ $item->subcategory->name }}<i
                                            class="success fa fa-long-arrow-up"></i></td>
                                    <td class=" ">{{ $item->product_name }}</td>
                                    <td class=" ">{{ $item->product_id }}</td>
                                    <td class=" ">{{ $item->description }}</td>
                                    <td class=" ">#{{ $item->size }}</td>
                                    <td class=" ">{{ $item->unit }}</td>
                                    <td class=" ">
                                        @foreach ($item->color as $i)
                                            <p
                                                style="height:13px;width:13px;float:left; margin-right: 1px;background:{{ $i['color'] }}">
                                            </p>
                                        @endforeach

                                    </td>
                                    <td class=" ">{{ $item->stock }}</td>
                                    <td class=" ">{{ $item->mini_order }}</td>
                                    <td class=" ">{{ $item->order_note }}</td>
                                    <td class=" ">{{ $item->price }}</td>
                                    <td class=" "><a href="">Image </a></td>
                                    <td class=" ">{{ $item->video_link }}</td>
                                    <td class=" ">

                                        @if ($item->status == 1)
                                            <a href="{{ route('merchant.status.product', $item->id) }}"
                                                class="btn btn-success">Published</a>
                                        @else
                                            <a href="{{ route('merchant.status.product', $item->id) }}"
                                                class="btn btn-danger">Unpublished</a>
                                        @endif

                                    </td>
                                    <td class="last">
                                        <a href="{{ route('merchant.edit.product', $item->id) }}"
                                            class="btn btn-info">Edit</a>
                                        <a href="{{ route('merchant.delete.product', $item->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    @endsection
