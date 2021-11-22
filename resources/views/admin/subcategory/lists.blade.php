@extends('admin.master')
@section('content')

    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>SubCategory Lists</h2>
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

                <p>Add SubCategory <code>new_Subcategory</code></p>

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
                                <th class="column-title">Name </th>
                                <th class="column-title">Image</th>
                                <th class="column-title">Status </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($subcategories as $item)


                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" ">{{ $loop->iteration }}</td>
                                    <td class=" ">#{{ $item->id }}</td>
                                    <td class=" ">{{ $item->category->name }}</td>
                                    <td class=" ">{{ $item->name }}<i
                                            class="success fa fa-long-arrow-up"></i></td>
                                    <td class=" ">{{ $item->image }}</td>
                                    <td class=" ">

                                        @if ($item->status == 1)
                                            <a href="{{ route('status.subcategory', $item->id) }}"
                                                class="btn btn-success">Published</a>
                                        @else
                                            <a href="{{ route('status.subcategory', $item->id) }}"
                                                class="btn btn-danger">Unpublished</a>
                                        @endif

                                    </td>
                                    <td class="last">
                                        <a href="{{ route('edit.subcategory', $item->id) }}"
                                            class="btn btn-info">Edit/Update</a>
                                        <a href="{{ route('delete.subcategory', $item->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $subcategories->links() }}

            </div>
        </div>
    @endsection
