<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('home') }}" class="site_title"><i class="fa fa-paw"></i> <span>STOCK
                    LOT</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('backend') }}/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i> Dashboard <span
                                class="fa fa-chevron-down"></span></a></li>
                    <li><a><i class="fa fa-edit"></i> Merchant <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('list.merchant') }}">Merchant lists</a></li>
                            <li><a href="form_advanced.html">Shop Lists</a></li>
                            <li><a href="form_validation.html">Merchant</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i>Reseller <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('list.reseller') }}">Reseller Lists</a></li>
                            <li><a href="media_gallery.html">Reseller</a></li>
                            <li><a href="typography.html">Reseller</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Product <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.merchant.products') }}">Merchant Product Lists</a></li>
                            <li><a href="chartjs2.html">Reseller Product Lists</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Order <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="chartjs.html">Merchant Order Lists</a></li>
                            <li><a href="chartjs2.html">Reseller Order</a></li>


                        </ul>
                    </li>
                    <li><a><i class="fa fa-clone"></i>Category <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('add.category') }}">Add Category</a></li>
                            <li><a href="{{ route('list.category') }}">Category List</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-clone"></i>SubCategory <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('add.subcategory') }}">Add SubCategory</a></li>
                            <li><a href="{{ route('list.subcategory') }}">SubCategory List</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-clone"></i>Slider <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('add.slider') }}">Add Slider</a></li>
                            <li><a href="{{ route('list.slider') }}">Slider List</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">

                <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i> Shop<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="e_commerce.html">Shop Lists</a></li>
                            <li><a href="projects.html">Shop</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-windows"></i> Coupons <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="page_403.html">Add Coupons</a></li>
                            <li><a href="page_404.html">Coupon Lists</a></li>


                        </ul>
                    </li>
                    <li><a><i class="fa fa-sitemap"></i> Generan Setting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#level1_1">Add Setting </a>

                            <li><a href="#level1_2">Check Setting</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Shipping</a></li>

                    <li><a><i class="fa fa-bar-chart-o"></i>Payment Method add <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('method.add') }}">Method Add</a></li>
                            <li><a href="chartjs2.html">Method list</a></li>


                        </ul>
                    </li>
                    <li><a><i class="fa fa-windows"></i> Pre Order <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('pre.add.product') }}">Add Product</a></li>
                            <li><a href="{{ route('pre.product.lists') }}">Product Lists</a></li>


                        </ul>
                    </li>

                    <li><a href="{{ route('currency.convert') }}"><i class="fa fa-laptop"></i>Currency Convert</a>
                    </li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('backend') }}/images/img.jpg" alt="">{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i
                                class="fa fa-sign-out pull-right"></i> Log
                            Out</a>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{ asset('backend') }}/images/img.jpg"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{ asset('backend') }}/images/img.jpg"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{ asset('backend') }}/images/img.jpg"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="{{ asset('backend') }}/images/img.jpg"
                                        alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
