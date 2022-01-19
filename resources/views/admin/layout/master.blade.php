<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/admin/images/favicon.ico">

    <title>پنل مدیریت</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="/admin/css/bootstrap-extend.css">

    <!-- theme style -->
    <link rel="stylesheet" href="/admin/css/master_style.css">

    <!-- Superieur Admin skins -->
    <link rel="stylesheet" href="/admin/css/skins/_all-skins.css">

    <!-- Data Table-->
    <link rel="stylesheet" type="text/css" href="/admin/assets/vendor_components/datatable/datatables.min.css"/>




</head>

<body class=" rtl">
<div >


    <aside class="main-sidebar">
        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i><span>دسته بندی ها</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        {{--                        <li><a href="{{route('categories.create')}}"><i class="mdi mdi-toggle-switch-off"></i>ایجاد</a>--}}
                        </li>
                        {{--                        <li><a href="{{route('categories.index')}}"><i class="mdi mdi-toggle-switch-off"></i>لیست</a>--}}
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i><span>محصولات</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('products.create')}}"><i class="mdi mdi-toggle-switch-off"></i>ایجاد</a>
                        </li>
                        <li><a href="{{route('products.index')}}"><i class="mdi mdi-toggle-switch-off"></i>لیست</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i><span>برندها</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        {{--                        <li><a href="{{route('brands.create')}}"><i class="mdi mdi-toggle-switch-off"></i>ایجاد</a>--}}
                        </li>
                        {{--                        <li><a href="{{route('brands.index')}}"><i class="mdi mdi-toggle-switch-off"></i>لیست</a>--}}
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i><span>نقش ها</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        {{--                        <li><a href="{{route('roles.create')}}"><i class="mdi mdi-toggle-switch-off"></i>ایجاد</a>--}}
                        </li>
                        {{--                        <li><a href="{{route('roles.index')}}"><i class="mdi mdi-toggle-switch-off"></i>لیست</a>--}}
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i><span>کاربران</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        {{--                        <li><a href="{{route('users.create')}}"><i class="mdi mdi-toggle-switch-off"></i>ایجاد</a>--}}
                        </li>
                        {{--                        <li><a href="{{route('users.index')}}"><i class="mdi mdi-toggle-switch-off"></i>لیست</a>--}}
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i><span>گروه مشخصات</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        {{--                        <li><a href="{{route('propertyGroups.create')}}"><i class="mdi mdi-toggle-switch-off"></i>ایجاد</a>--}}
                        </li>
                        {{--                        <li><a href="{{route('propertyGroups.index')}}"><i class="mdi mdi-toggle-switch-off"></i>لیست</a>--}}
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i><span> مشخصات</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        {{--                        <li><a href="{{route('properties.create')}}"><i class="mdi mdi-toggle-switch-off"></i>ایجاد</a>--}}
                        </li>
                        {{--                        <li><a href="{{route('properties.index')}}"><i class="mdi mdi-toggle-switch-off"></i>لیست</a>--}}
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="mdi mdi-apps"></i><span> سفارشات</span><span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        {{--                        <li><a href="{{route('properties.create')}}"><i class="mdi mdi-toggle-switch-off"></i>ایجاد</a>--}}
                        </li>
                        {{--                        <li><a href="{{route('properties.index')}}"><i class="mdi mdi-toggle-switch-off"></i>لیست</a>--}}
                        </li>
                    </ul>
                </li>

            </ul>
        </section>
    </aside>

    <div class="content-wrapper">

        <section class="content">
        @yield('content')
        </section>

    </div>


</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="/admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>


<!-- Bootstrap 4.0-->
<script src="/admin/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>


<!-- This is data table -->
<script src="/admin/assets/vendor_components/datatable/datatables.min.js"></script>

<!-- Superieur Admin App -->
<script src="/admin/js/template.js"></script>



@yield('scripts')

</body>
</html>
