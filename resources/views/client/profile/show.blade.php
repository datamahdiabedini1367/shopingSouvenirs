@extends('client.profile.profile_master')

@section('profile_title')
    پروفایل کاربری
@endsection


profile_content
@section('profile_content')
    <div class="col-12 col-lg-9 pl-lg-0 pr-lg-2 mt-2 mt-lg-0">
        <!-- Profile Fields -->
        <div class="custom-container bg-light" id="profile-fields">
            <div class="row pt-2 px-3 ">
                <div class="col-12"><h1>اطلاعات شخصی</h1></div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 profile-field py-2">
                        <div class="row">
                            <div class="col-10">
                                <div class="title">نام</div>
                                <div class="value">{{$user->firstname}}</div>
                            </div>
                            <div class="col-2">
                                {{--                                                        <a href="#" class="float-left" data-toggle="modal" data-target="#fullNameModal"><i class="fa fa-edit"></i></a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 profile-field py-2">
                        <div class="row">
                            <div class="col-10">
                                <div class="title">نام خانوادگی</div>
                                <div class="value">{{$user->lastname}}</div>
                            </div>
                            {{--                                                    <div class="col-2">--}}
                            {{--                                                        <a href="#" class="float-left" data-toggle="modal" data-target="#nationalCodeModal"><i class="fa fa-edit"></i></a>--}}
                            {{--                                                    </div>--}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 profile-field py-2">
                        <div class="row">
                            <div class="col-10">
                                <div class="title">شماره تلفن همراه</div>
                                <div class="value">{{$user->mobile}}</div>
                            </div>
                            {{--                                                    <div class="col-2">--}}
                            {{--                                                        <a href="#" class="float-left" data-toggle="modal" data-target="#mobileModal"><i class="fa fa-edit"></i></a>--}}
                            {{--                                                    </div>--}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 profile-field py-2">
                        <div class="row">
                            <div class="col-10">
                                <div class="title">پست الکترونیک</div>
                                <div class="value">{{$user->email}}</div>
                            </div>
                            {{--                                                    <div class="col-2">--}}
                            {{--                                                        <a href="#" class="float-left" data-toggle="modal" data-target="#emailModal"><i class="fa fa-edit"></i></a>--}}
                            {{--                                                    </div>--}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 profile-field py-2">
                        <div class="row">
                            <div class="col-10">
                                <div class="title">ایمیل تایید شده است؟</div>
                                <div class="value">{{$user->is_verify_email}}</div>
                            </div>
                            {{--                                                    <div class="col-2">--}}
                            {{--                                                        <a href="#" class="float-left" data-toggle="modal" data-target="#emailModal"><i class="fa fa-edit"></i></a>--}}
                            {{--                                                    </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Fields -->

        <!-- Latest Orders -->
    {{--                                <div class="mt-2 order">--}}
    {{--                                    <div class="row pt-2 px-3">--}}
    {{--                                        <div class="col-12"><h2>آخرین سفارش ها</h2></div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="custom-container mt-2 order">--}}
    {{--                                    <div class="row pt-2 px-3">--}}
    {{--                                        <div class="col-12 col-sm-6"><h2>سفارش شماره #1234</h2></div>--}}
    {{--                                        <div class="col-12 col-sm-6 text-sm-end"><span>20 مرداد 1400</span> - <span>پرداخت شده</span></div>--}}
    {{--                                    </div>--}}
    {{--                                    <hr>--}}
    {{--                                    <div class="container">--}}
    {{--                                        <div class="row py-2">--}}
    {{--                                            <div class="col-12">--}}
    {{--                                                <div>--}}
    {{--                                                    <div class="header">--}}
    {{--                                                        <div class="total py-1"><span>مبلغ کل:</span> 3.000.000 تومان</div>--}}
    {{--                                                    </div>--}}
    {{--                                                    <div class="container products px-0">--}}
    {{--                                                        <div class="row">--}}
    {{--                                                            <!-- Order Record -->--}}
    {{--                                                            <span class="col-12 col-sm-6 col-lg-4 col-xl-3 px-1">--}}
    {{--                                                            <a href="../product.html" target="_blank">--}}
    {{--                                                                <div class="encoded-54554322">--}}
    {{--                                                                    <div class="image" style="background-image: url('../assets/images/products/p100.png')"></div>--}}
    {{--                                                                    <div class="text-center px-1 px-sm-3">--}}
    {{--                                                                        <h2>گوشی موبایل سامسونگ مدل Galaxy A21s</h2>--}}
    {{--                                                                        <div class="number">تعداد: 1 عدد</div>--}}
    {{--                                                                        <div class="encoded-54434312975">مبلغ: 3.000.000 عدد</div>--}}
    {{--                                                                    </div>--}}
    {{--                                                                </div>--}}
    {{--                                                            </a>--}}
    {{--                                                        </span>--}}
    {{--                                                            <!-- /Order Record -->--}}
    {{--                                                            <!-- Order Record -->--}}
    {{--                                                            <span class="col-12 col-sm-6 col-lg-4 col-xl-3 px-1">--}}
    {{--                                                            <a href="../product.html" target="_blank">--}}
    {{--                                                                <div class="encoded-54554322">--}}
    {{--                                                                    <div class="image" style="background-image: url('../assets/images/products/p100.png')"></div>--}}
    {{--                                                                    <div class="text-center px-1 px-sm-3">--}}
    {{--                                                                        <h2>گوشی موبایل سامسونگ مدل Galaxy A21s</h2>--}}
    {{--                                                                        <div class="number">تعداد: 1 عدد</div>--}}
    {{--                                                                        <div class="encoded-54434312975">مبلغ: 3.000.000 عدد</div>--}}
    {{--                                                                    </div>--}}
    {{--                                                                </div>--}}
    {{--                                                            </a>--}}
    {{--                                                        </span>--}}
    {{--                                                            <!-- /Order Record -->--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    <!-- Latest Orders -->
    </div>
@endsection
