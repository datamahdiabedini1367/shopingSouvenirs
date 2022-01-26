@extends('client.layouts.app')


@section('title' , __('auth.reset password'))


@section('content')




    <section class="inner-page" id="contact-page">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                <h1>تغییر رمز عبور</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">تغییر رمز عبور</li>
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
                                <div class="title">تغییر رمز عبور</div>
                                <form method="POST" action="{{route('auth.password.reset')}}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{$token}} ">

                                    <div class="form-group">
                                        <label for="email">ایمیل</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               readonly value="{{$email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">رمز عبور</label>
                                        <input type="password" class="form-control" id="password"
                                               name="password" placeholder="رمز عبور خود را وارد کنید">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">تکرار رمز عبور</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                               name="password_confirmation" placeholder="تکرار رمز عبور خود را وارد کنید">
                                    </div>
                                    <div class="form-group">
                                        @include('partials.validation-errors')

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">تغییر رمز عبور</button>
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
