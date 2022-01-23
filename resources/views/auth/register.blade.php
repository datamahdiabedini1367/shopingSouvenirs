@extends('client.layouts.app')

@section('title' , __('auth.register user'))

@section('links')
    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
@endsection

@section('content')



    <section class="inner-page" id="contact-page">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                <h1>عضویت در سایت</h1>
                                <p>با عضویت در سایت از همه امکانات سوغات مارکت بهره مند شوید.</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">عضویت</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-2 py-md-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1">
                    <div class="content">
                        <form action="{{route('auth.register')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-5 text-center">
                                    <img src="{{asset('client/assets/images/login.png')}}" alt="">
                                </div>
                                <div class="col-12 col-lg-7 pt-5 pt-md-0 align-self-center">
                                    <div class="title">عضویت در سوغات مارکت</div>
                                    <p>با ورود به ناحیه کاربری خود از همه امکانات سایت بهره مند شوید.</p>
                                    <div class="form-group">
                                        <label for="firstname">@lang('auth.firstname')</label>
                                        <input type="text" class="form-control"
                                               value="{{old('firstname')}}"
                                               name="firstname" id="firstname"
                                               placeholder="@lang('auth.enter your firstname')">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">@lang('auth.lastname')</label>
                                        <input type="text" class="form-control" id="lastname"
                                               name="lastname"
                                               placeholder="@lang('auth.enter your lastname')"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile">@lang('auth.mobile')</label>
                                        <input value="{{old('mobile')}}"
                                               name="mobile" type="tel"
                                               class="form-control"
                                               id="mobile"
                                               placeholder="@lang('auth.enter your mobile')"

                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="email">@lang('auth.email')</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{old('email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password"> @lang('auth.password')</label>
                                        <input type="password" class="form-control"
                                               name="password"
                                               id="password"
                                               placeholder="@lang('auth.enter your password')"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">@lang('auth.confirm password')</label>
                                        <input type="password"
                                               name="password_confirmation"
                                               placeholder="@lang('auth.confirm your password')"
                                               class="form-control" id="password_confirmation">
                                    </div>

                                    <div class="form-group">

                                    @include('partials.recaptcha')
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">@lang('auth.register')</button>

                                    </div>
                                    @include('partials.validation-errors')

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


















@endsection
