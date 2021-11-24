@extends('reseller.master')
@section('content')

    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Affiliate Member Lists</h2>
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
                                <th class="column-title">Name </th>
                                <th class="column-title">Address</th>
                                <th class="column-title">Role </th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($members as $member)


                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" ">{{ $loop->iteration }}</td>
                                    <td class=" ">{{ $member->name }}<i
                                            class="success fa fa-long-arrow-up"></i></td>
                                    <td class=" ">{{ $member->country . ',' . $member->state }}</td>
                                    <td class=" ">
                                        @if ($member->role == 'reseller')
                                            <a class="btn btn-info" style="color:white">{{ $member->role }} </a>
                                        @elseif($member->role=='merchant')
                                            <a class="btn btn-danger" style="color:white">{{ $member->role }} </a>

                                        @endif
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    @endsection
