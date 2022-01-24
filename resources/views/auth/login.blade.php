@extends('client.layouts.app')
@section('links')
    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
@endsection

@section('title' , __('auth.login'))


@section('content')
<!--
    {{--<pre dir="ltr" style="text-align: left">--}}
    {{--    @php--}}
    {{--    dump(session()->all());--}}
    {{--    @endphp--}}
    {{--    </pre>--}}
{{----}}
    {{--    <div class="row justify-content-center">--}}
{{--    <div class="col-md-6">--}}
{{--        @include('partials.alerts')--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-7">--}}
{{--                        @lang('auth.login')--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-5 text-right"><a--}}
{{--                            href="{{route('auth.magic.login.form')}}"--}}
{{--                        ><small>@lang('auth.login with magic link')</small></a></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <form method="POST" action="{{route('auth.login')}}">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-3 col-form-label" for="email">@lang('auth.email')</label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}"--}}
{{--                                   aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-3 col-form-label" for="password">@lang('auth.password')</label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <input type="password" name="password" class="form-control" id="password"--}}
{{--                                   placeholder="@lang('auth.enter your password')">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="offset-sm-3">--}}
{{--                        @include('partials.recaptcha')--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <div class="form-check offset-sm-3">--}}
{{--                            <input type="checkbox" class="form-check-input" name="remember" id="remember">--}}
{{--                            <label class="form-check-label" for="remember"><small>@lang('auth.remember me')</small></label>--}}
{{--                        </div>--}}
{{--                        <div class="form-check">--}}
{{--                            <a href="{{route('auth.password.forget.form')}}">--}}
{{--                                <small>@lang('auth.forget your password?')</small>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="offset-sm-3">--}}
{{--                        @include('partials.validation-errors')--}}
{{--                    </div>--}}
{{--                    <div class="offset-sm-3">--}}
{{--                        <button type="submit" class="btn btn-primary">--}}
{{--                            @lang('auth.login')--}}
{{--                        </button>--}}
{{--                        <a--}}
{{--                            href="{{route('auth.login.provider.redirect', ['provider'=>'google'])}}"--}}
{{--                            class="btn btn-danger">--}}
{{--                            @lang('auth.login with google')--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


-->








    <section class="inner-page" id="contact-page">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                <h1>ورود به ناحیه کاربری</h1>
                                <p>وارد ناحیه کاربری خود در سوغات مارکت شوید.</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">@lang('auth.login')</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-2 py-md-5">
            @include('partials.alerts')
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1">
                    <div class="content">
                        <div class="row">
                            <div class="col-12 col-lg-5 text-center">
                                <img src="{{asset('client/assets/images/login.png')}}" alt="">
                            </div>
                            <div class="col-12 col-lg-7 pt-5 pt-md-0 align-self-center">
                                <div class="title">وارد شوید</div>
                                <p>با عضویت در سایت از همه امکانات سایت بهره مند شوید.</p>
                                <form method="POST" action="{{route('auth.login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">@lang('auth.email')</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{old('email')}}" placeholder="@lang('auth.enter your email')">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">@lang('auth.password')</label>
                                        <input type="password" class="form-control" id="password"
                                               name="password" placeholder="@lang('auth.enter your password')">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">کد امنیتی</label>
                                        @include('partials.recaptcha')
                                    </div>

                                    <div class="form-group ">
                                        <div class="form-check ">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                            <label class="form-check-label" for="remember"><small>@lang('auth.remember me')</small></label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <input type="submit" value="ورود به ناحیه کاربری" class="btn btn-success">
                                        <a href="{{route('auth.password.forget.form')}}" class="btn btn-info">
                                            <small>@lang('auth.forget your password?')</small>
                                        </a>

                                        <a href="{{route('auth.login.provider.redirect', ['provider'=>'google'])}}"
                                            class="btn btn-danger">
                                            @lang('auth.login with google')
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
