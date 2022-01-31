@extends('admin.layouts.app')

@section('title' ,"مشاهده پروفایل")

@section('content')

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">پروفایل من</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">پروفایل</li>
                                    <li class="breadcrumb-item active" aria-current="page">مشاهده و ویرایش</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            @include('partials.alerts')

                            <div class="box-header with-border">
                                <h4 class="box-title">درباره من</h4>
                            </div>
                            <div class="box-body">
                                <form action="{{route('admin.user.update.profile', $user->id)}}" method="post">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-700 font-size-16">نام </label>
                                                    <input type="text" class="form-control" placeholder="نام " value="{{$user->firstname}}" name="firstname">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-700 font-size-16">نام خانوادگی </label>
                                                    <input type="text" class="form-control" placeholder="نام خانوادگی" value="{{$user->lastname}}" name="lastname">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-700 font-size-16">ایمیل </label>
                                                    <input type="email" class="form-control" placeholder="ایمیل" value="{{$user->email}}" name="email">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-700 font-size-16">موبایل </label>
                                                    <input type="text" class="form-control" placeholder="موبایل" value="{{$user->mobile}}" name="mobile">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-700 font-size-16">پسورد </label>
                                                    <input type="password" class="form-control" placeholder="پسورد" value="" name="password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-700 font-size-16">تکرار پسورد </label>
                                                    <input type="password" class="form-control" placeholder="پسورد" value="" name="password_confirmation">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-actions mt-10">
                                        <button type="submit" class="btn btn-rounded btn-primary"><i class="fa fa-check"></i> ذخیره</button>
                                        <button type="button" class="btn btn-rounded btn-danger">لغو</button>
                                    </div>
                                </form>
                                @include('partials.validation-errors')
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
