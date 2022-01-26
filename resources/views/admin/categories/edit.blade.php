@extends('admin.layouts.app')

@section('title' ,"ثبت دسته بندی جدید")

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">ویرایش دسته بندی</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش دسته</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        @include('partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">دسته بندی</h4>
                    </div>
                    <div class="box-body">
                        <form action="{{route('admin.categories.update' , $category->id)}}" method="post">
                            @csrf
                            @method('patch')

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label class="font-weight-700 font-size-16">نام دسته بندی</label>
                                            <input type="text" class="form-control" placeholder="نام محصول" name="category_name" value="{{$category->category_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-700 font-size-16">دسته بندی والد</label>
{{--                                        @dd($categories);--}}

                                        <select class="form-control" data-placeholder="یک دسته را انتخاب کنید" tabindex="1" name="category_id">

                                            @foreach($categories as $parent)
                                                <option value="{{$parent->id}}" @if($parent->id == $category->category_id) selected @endif>{{$parent->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">شرح دسته بندی</label>
                                            <textarea class="form-control p-20" rows="4" name="description"
                                                      placeholder="شرح دسته بندی را وارد کنید.">{{$category->description}}</textarea>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                            <div class="form-actions mt-10">
                                <button type="submit" class="btn btn-rounded btn-primary"><i class="fa fa-check"></i> ذخیره</button>
                                <button type="reset" class="btn btn-rounded btn-danger">لغو</button>
                            </div>
                        </form>
                        <div class="col-sm-9 offset-sm-3">
                            @include('partials.validation-errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
<!-- Site wrapper -->







