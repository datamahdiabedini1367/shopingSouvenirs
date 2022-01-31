@extends('client.layouts.app')


@section('content')

    {{--    @dd(Auth::user()->address_default)--}}

    <section class="inner-page" id="checkout-page">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                <h1>مرحله نهایی</h1>
                                <p>با تکیمل پرداخت فاکتور، خرید خود را تکمیل کنید.</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">مرحله نهایی</li>
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
                        @include('partials.alerts')
                        <div class="row">
                            <div class="col-12 col-lg-9">
                                <!-- Choose Address -->
                                <section id="choose-address">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 py-3">
                                                <div class="pb-1 title">آدرس تحویل سفارش</div>
                                                @if(!is_null( Auth::user()->address_default() ))
                                                    <div class="row">
                                                        <div class="col-12 col-md-9 pl-0" id="address-detail">
                                                            <div class="p-3 ml-3 mb-2 mb-md-0 ml-md-0 address-to-send">
                                                                <div class="address-title">
                                                                    <span id="province-title"> {{Auth::user()->address_default()->title}}</span>
                                                                    <br>
                                                                    <span id="province-title">{{Auth::user()->address_default()->state}}</span>،
                                                                    <span id="city-title">{{Auth::user()->address_default()->city}}</span>،
                                                                    <span id="address">{{Auth::user()->address_default()->address}}</span>،
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-4">کدپستی: {{Auth::user()->address_default()->postal_code}}</div>
                                                                    <div class="col-12 col-md-8">تحویل گیرنده: {{Auth::user()->address_default()->receiver}}
                                                                        | {{Auth::user()->address_default()->phone_number}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="row">
                                                                <div class="col-6 col-md-12 pl-2 px-md-3">
                                                                    <a href="{{route('client.profile.address.edit',Auth::user()->address_default()->id)}}">
                                                                        <div class="btn btn-light w-100">تغییر آدرس</div>
                                                                    </a>
                                                                </div>
                                                                <div class="col-6 col-md-12 pr-2 px-md-3">
                                                                    <a href="{{route('client.profile.address.index')}}">
                                                                        <div class="btn btn-outline-dark mt-0 mt-md-1 w-100">افزودن آدرس جدید</div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    شما هیچ آدرسی را به عنوان آدرس پیش فرض برای ارسال محصول مشخص نکردید لطفا با زدن این
                                                    <a href="{{route('client.profile.address.index')}}">لینک</a>
                                                    آدرس پیش فرض را انتخاب کنید.
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- /Choose Address -->

                                <!-- Orders List -->
                                <!-- /Orders List -->

                                <!-- Choose Date To Send -->
                                <section class="mt-3" id="select-receive-date">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="container px-0">
                                                    <div class="row">
                                                        <div class="col-12 px-0">
                                                            <div class="row py-2 px-3">
                                                                <div class="col-12">
                                                                    <div class="pb-1 title">انتخاب روش پرداخت</div>
                                                                    <form action="{{route('basket.checkout')}}" id='checkout-form' method="post">
                                                                        @csrf

                                                                        @include('partials.validation-errors')

                                                                        <div class="row">
                                                                            <div class="col-12 col-sm-12 col-lg-12 pt-3 pt-md-0 pl-2">
                                                                                <ul class="list-group list-group-flush">
                                                                                    <li class="list-group-item">
                                                                                        <div class="row">
                                                                                        <div class="custom-control custom-radio col-md-6 custom-control-inline">
                                                                                            <input type="radio" id="online" value="online" name="method"
                                                                                                   class="custom-control-input">
                                                                                            <label class="custom-control-label" for="online">
                                                                                                پرداخت آنلاین
                                                                                            </label>

                                                                                        </div>


                                                                                        <div class="col-6">
                                                                                            <select name='gateway' class=" col-md-4 px-3 form-control form-control-sm">
                                                                                                <option value="saman">سامان</option>
                                                                                                <option value="pasargad">پاسارگاد</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        </div>
                                                                                        <p class='text-muted small'>
                                                                                            در این روش شما میتونید درب منزل خود مبلغ را پرداخت نمایید
                                                                                        </p>
                                                                                    </li>

                                                                                    <li class="list-group-item">
                                                                                        <div class="custom-control custom-radio">
                                                                                            <input type="radio" id="cash" value="cash" name="method" class="custom-control-input">
                                                                                            <label class="custom-control-label" for="cash">
                                                                                                پرداخت نقدی
                                                                                            </label>
                                                                                        </div>

                                                                                        <p class='text-muted small'>
                                                                                            در این روش شما میتونید درب منزل خود مبلغ را پرداخت نمایید
                                                                                        </p>

                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>
                            <div class="col-12 col-lg-3  mt-lg-0  ">

                                @include('client.summery')
                                <a onclick="event.preventDefault();document.getElementById('checkout-form').submit()"
                                   class="btn btn-sm btn-success btn-lg w-100 d-block">@lang('payment.pay')</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<!--

    <div class="row mt-5">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    @lang('payment.user information')


                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">@lang('payment.grabber') : {{Auth::user()->firstname .'--------'.Auth::user()->lastname}}</li>
                        <li class="list-group-item">@lang('payment.address') : {{Auth::user()->address}}</li>
                        <li class="list-group-item">@lang('payment.phone number') : {{Auth::user()->mobile}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('summary')
            <a onclick="event.preventDefault();document.getElementById('checkout-form').submit()" class="btn btn-primary d-block w-100">@lang('payment.pay')</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @lang('payment.pay ways')
                </div>
                <div class="card-body">
                    <form action="{{route('basket.checkout')}}" id='checkout-form' method="post">
                        @csrf
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="custom-control custom-radio col-md-6 custom-control-inline">
                                    <input type="radio" id="online" value="online" name="method" class="custom-control-input">
                                    <label class="custom-control-label" for="online">
                                        پرداخت آنلاین
                                    </label>

                                </div>

                                <select name='gateway' class="custom-select col-md-4  custom-control-inline">
                                    <option value="saman">سامان</option>
                                    <option value="pasargad">پاسارگاد</option>
                                </select>

                                <p class='text-muted small'>
                                    در این روش شما میتونید درب منزل خود مبلغ را پرداخت نمایید
                                </p>
                            </li>

                            <li class="list-group-item">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cash" value="cash" name="method" class="custom-control-input">
                                    <label class="custom-control-label" for="cash">
                                        پرداخت نقدی
                                    </label>
                                </div>

                                <p class='text-muted small'>
                                    در این روش شما میتونید درب منزل خود مبلغ را پرداخت نمایید
                                </p>

                            </li>
                            <li class="list-group-item">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cart" value="cart" name="method" class="custom-control-input">
                                    <label class="custom-control-label" for="cart">
                                        کارت به کارت
                                    </label>
                                </div>

                                <p class='text-muted small'>
                                    لطفا مبلغ را به شماره کارت ۵۵۵۵−۵۵۵۵−۵۵۵۵−۵۵۵۵ واریز نمایدد و کد پیگیری را به همکاران ما اطلاع دهید
                                </p>

                            </li>
                        </ul>
                    </form>
                    @include('partials.validation-errors')
                </div>
            </div>

        </div>
    </div>
-->
@endsection




























