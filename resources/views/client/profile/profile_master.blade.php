@extends('client.layouts.app')

@section('title')
    پروفایل کاربری
@endsection
@php
    use Illuminate\Support\Facades\Route;
@endphp

@section('content')

    <section class="inner-page" id="profile-page">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                <h1>ناحیه کاربری</h1>
                                <p>به ناحیه کاربری روبیک مارکت خوش آمدید.</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.html">صفحه نخست</a></li>
                                        <li class="breadcrumb-item"><a href="#">ناحیه کاربری</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> @yield('profile_title')</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content">
                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <!-- Side Panel -->
                                <div class="accordion" id="side-panel">
                                    <div class="accordion-item menu-container">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            <span class="row">
                                                <span class="col-3 col-sm-2 col-lg-3">
                                                    <img src="{{asset('client/assets/images/user-no-image.jpg')}}" class="rounded-circle">
                                                </span>
                                                <span class="col-7 col-sm-8 col-lg-7 pt-0 pt-sm-2 pt-md-3 pt-lg-0 align-self-center">
                                                    <div id="full-name">{{auth()->user()->name}}</div>
                                                    <div class="mt-2" id="email-mobile">{{auth()->user()->mobile}}</div>
                                                </span>
                                            </span>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li>
                                                        <a href="{{route('client.profile.show')}}"
                                                           @if(Route::currentRouteName() == 'client.profile.show' ) class="active" @endif >
                                                            <div>
                                                                <div class="icon d-inline-block"><img src="{{asset('client/assets/images/icons/profile-menu/profile.webp')}}"
                                                                                                      class="pl-2"></div>
                                                                اطلاعات حساب
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('client.profile.orders.show')}}"
                                                        @if(Route::currentRouteName() == 'client.profile.orders.show' ) class="active" @endif >
                                                            <div>
                                                                <div class="icon d-inline-block"><img src="{{asset('client/assets/images/icons/profile-menu/orders.webp')}}" class="pl-2"></div>
                                                                سفارش های من
                                                            </div>
                                                        </a>
                                                    </li>
{{--                                                    <li>--}}
{{--                                                        <a href="favorites.html">--}}
{{--                                                            <div>--}}
{{--                                                                <div class="icon d-inline-block"><img src="{{asset('client/assets/images/icons/profile-menu/favorites.webp')}}"--}}
{{--                                                                                                      class="pl-2"></div>--}}
{{--                                                                علاقه مندی ها--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
                                                    <li>
                                                        <a href="{{route('client.profile.address.index')}}"
                                                           @if(Route::currentRouteName() == 'client.profile.address.index' ) class="active" @endif >
                                                            <div>
                                                                <div class="icon d-inline-block"><img src="{{asset('client/assets/images/icons/profile-menu/addresses.webp')}}"
                                                                                                      class="pl-2"></div>
                                                                آدرس های من
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('auth.logout')}}">
                                                            <div>
                                                                <div class="icon d-inline-block">
                                                                    <img src="{{asset('client/assets/images/icons/profile-menu/exit.webp')}}" class="pl-2">
                                                                </div>
                                                                خروج از حساب
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Side Panel -->
                            </div>
                            <div class="col-12 col-lg-9 pl-lg-0 pr-lg-2 mt-2 mt-lg-0">
                                @yield('profile_content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
