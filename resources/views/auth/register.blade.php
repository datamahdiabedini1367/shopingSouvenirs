@extends('layouts.app')

@section('title' , __('auth.register user'))

@section('links')
    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.alerts')
            <div class="card">
                <div class="card-header">
                    @lang('auth.register user')
                </div>
                <div class="card-body">

                    <form action="{{route('auth.register')}}" method="post">
                        @csrf


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="email">@lang('auth.email')</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}"
                                       aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="firstname">@lang('auth.firstname')</label>
                            <div class="col-sm-9">
                                <input value="{{old('firstname')}}" type="text" name="firstname" class="form-control" id="firstname"
                                       placeholder="@lang('auth.enter your firstname')">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="lastname">@lang('auth.lastname')</label>
                            <div class="col-sm-9">
                                <input value="{{old('lastname')}}" type="text" name="lastname" class="form-control" id="lastname"
                                       placeholder="@lang('auth.enter your lastname')">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="password">@lang('auth.password')</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="@lang('auth.enter your password')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="password_confirmation">@lang('auth.confirm password')</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control"
                                       id="password_confirmation" placeholder="@lang('auth.confirm your password')">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="phone_number">@lang('auth.mobile')</label>
                            <div class="col-sm-9">
                                <input value="{{old('mobile')}}" name="mobile" type="tel" class="form-control" id="mobile"
                                       placeholder="@lang('auth.enter your mobile')">
                            </div>
                        </div>
                        <div class="offset-sm-3">
                            @include('partials.recaptcha')
                        </div>

                        <div class="offset-sm-3">
                            @include('partials.validation-errors')
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('auth.register')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
