<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/admin/images/logo-light.png">

    <title>@yield('title')</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet"
          href="{{asset('admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">

    <!-- daterange picker -->
    <link rel="stylesheet"
          href="{{asset('admin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">

    <!-- Data Table-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/assets/vendor_components/datatable/datatables.min.css')}}">

    <!-- Chartist-->
    <link rel="stylesheet"
          href="{{asset('admin/assets/vendor_components/chartist-js-develop/chartist.css')}}">

    <!-- Bootstrap extend-->
    <link rel="stylesheet"
          href="{{asset('admin/css/bootstrap-extend.css')}}">

    <!-- Admin main-nav -->
    <link href="{{asset('admin/css/main-nav.css')}}" rel="stylesheet">

    <!-- theme style -->
    <link rel="stylesheet" href="{{asset('admin/css/master_style.css')}}">

    @yield('links')


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body class="layout-top-nav light-skin theme-fruit rtl">

<div class="wrapper">

    <div class="art-bg">
{{--        <img src="http://crmx-admin-template.multipurposethemes.com/images/art1.svg" alt="" class="art-img light-img">--}}
{{--        <img src="http://crmx-admin-template.multipurposethemes.com/images/art2.svg" alt="" class="art-img dark-img">--}}
    </div>

    <header class="main-header">
        <div class="inside-header">

            <!-- Logo -->
{{--            <a href="index-2.html" class="logo">--}}
                <!-- mini logo -->
{{--                <div class="logo-mini">--}}
{{--                    <span class="light-logo"><img src="../admin/images/logo-light.png" alt="logo"></span>--}}
{{--                    <span class="dark-logo"><img src="../admin/images/logo-dark.png" alt="logo"></span>--}}
{{--                </div>--}}
                <!-- logo-->
{{--                <div class="logo-lg">--}}
{{--                    <span class="light-logo"><img src="../admin/images/logo-light-text.png" alt="logo"></span>--}}
{{--                    <span class="dark-logo"><img src="../admin/images/logo-dark-text.png" alt="logo"></span>--}}
{{--                </div>--}}
{{--            </a>--}}
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <div>
                    <a id="toggle_res_search" data-toggle="collapse" data-target="#search_form" class="res-only-view" href="javascript:void(0);">
                        <i class="mdi mdi-magnify"></i>
                    </a>
                    <form id="search_form" role="search" class="top-nav-search pull-left collapse ml-20">
                        <div class="input-group">
                            <input type="text" name="example-input1-group2" class="form-control" placeholder="جستجو">
                            <span class="input-group-btn">
					<button type="button" class="btn  btn-default" data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="mdi mdi-magnify"></i></button>
					</span>
                        </div>
                    </form>

                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <!-- full Screen -->
                        <li class="full-screen-btn">
                            <a href="#" data-provide="fullscreen" title="Full Screen">
                                <i class="mdi mdi-crop-free"></i>
                            </a>
                        </li>
                        <!-- Messages -->
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="سفارشات جدید">
                                <i class="mdi mdi-bell"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">

                                <li class="header">
                                    <div class="bg-light p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">سفارشات جدید</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">پاک کردن همه</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-success"></i> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#" class="bg-light">مشاهده همه</a>
                                </li>
                            </ul>
                        </li>

                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="کاربر">
                                <img src="{{asset('admin/images/avatar/7.jpg')}}" class="user-image rounded-circle" alt="User Image">
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <!-- User image -->
                                <li class="user-header bg-img" style="background-image: url('{{asset('admin/images/user-info.jpg')}}')" data-overlay="3">
                                    <div class="flexbox align-self-center">
                                        <img src="{{asset('admin/images/avatar/7.jpg')}}" class="float-left rounded-circle" alt="User Image">
                                        <h4 class="user-name align-self-center">
                                            <span>آرش خادملو</span>
                                            <small>samuel@gmail.com</small>
                                        </h4>
                                    </div>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-person"></i> پروفایل من</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-settings"></i> تنظیمات حساب</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion-log-out"></i> خروج</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="p-10"><a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-success">مشاهده پروفایل</a></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <nav class="main-nav" role="navigation">

        <!-- Mobile menu toggle button (hamburger/x icon) -->
        <input id="main-menu-state" type="checkbox">
        <label class="main-menu-btn" for="main-menu-state">
            <span class="main-menu-btn-icon"></span> تعویض دید منوی اصلی
        </label>

        <!-- Sample menu definition -->
        <ul id="main-menu" class="sm sm-rtl sm-blue">

            <li><a @if(\Illuminate\Support\Facades\Route::currentRouteName() == "") @endif href="index-3.html" ><i class="ti-dashboard mx-5"></i> داشبورد فروشگاهی</a></li>
            <li><a @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.categories.index' ) class="current" @endif href="{{route('admin.categories.index')}}" ><i class="ti-files mx-5"></i></i> دسته بندی کالا</a></li>
            <li><a @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.products.index') class="current" @endif href="{{route('admin.products.index')}}" ><i class="ti-files mx-5"></i></i> محصولات</a></li>
            <li><a @if(\Illuminate\Support\Facades\Route::currentRouteName() == "admin.order.index") @endif href="{{route('admin.order.index')}}" ><i class="ti-layout-grid2 mx-5"></i> سفارشات</a></li>
            <li><a @if(\Illuminate\Support\Facades\Route::currentRouteName() == "") @endif href="index-3.html" ><i class="ti-pencil-alt mx-5"></i> مشتریان</a></li>

        </ul>
    </nav>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->

                   @yield('content')

            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right d-none d-sm-inline-block">
        </div>
پایین صفحه
    </footer>


</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script
    src="{{asset('admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js')}}"></script>

<!-- fullscreen -->
<script
    src="{{asset('admin/assets/vendor_components/screenfull/screenfull.js')}}"></script>

<!-- popper -->
<script
    src="{{asset('admin/assets/vendor_components/popper/dist/popper.min.js')}}"></script>

<!-- Bootstrap 4.0-->
<script
    src="{{asset('admin/assets/vendor_components/bootstrap/dist/js/bootstrap.js')}}"></script>

<!-- Slimscroll -->
<script
    src="{{asset('admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- date-range-picker -->
<script
    src="{{asset('admin/assets/vendor_components/moment/min/moment.min.js')}}"></script>
<script
    src="{{asset('admin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Sparkline -->
<script
    src="{{asset('admin/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>

<!-- eChart Plugins -->
<script
    src="{{asset('admin/assets/vendor_components/echarts/dist/echarts-en.min.js')}}"></script>

<!-- Chartist  -->
<script
    src="{{asset('admin/assets/vendor_components/chartist-js-develop/chartist.js')}}"></script>

<!-- FastClick -->
<script
    src="{{asset('admin/assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>

<!-- This is data table -->
<script
    src="{{asset('admin/assets/vendor_components/datatable/datatables.min.js')}}"></script>

<!-- apexcharts -->
<script
    src="{{asset('admin/assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
{{--<script src="../admin/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>--}}

<!-- CrmX Admin App -->
<script src="{{asset('admin/js/jquery.smartmenus.js')}}"></script>
<script src="{{asset('admin/js/menus.js')}}"></script>
<script src="{{asset('admin/js/template.js')}}"></script>

<!-- CrmX Admin dashboard demo (This is only for demo purposes) -->
{{--<script src="admin/js/pages/dashboard2.js"></script>--}}

<!-- CrmX Admin for demo purposes -->
<script src="{{asset('admin/js/demo.js')}}"></script>
@yield('scripts')

</body>

</html>
