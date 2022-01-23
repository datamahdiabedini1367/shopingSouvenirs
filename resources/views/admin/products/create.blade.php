@extends('admin.layouts.app')

@section('title' ,"ثبت محصول جدید")

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">ثبت محصول جدید</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                            <li class="breadcrumb-item active" aria-current="page">ثبت</li>
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
                    <div class="box-header with-border">
                        <h4 class="box-title">درباره محصول</h4>
                    </div>
                    <div class="box-body">
                        <form action="{{route('admin.products.store')}}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label class="font-weight-700 font-size-16">نام محصول</label>
                                            <input type="text" class="form-control" placeholder="نام محصول" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <label class="font-weight-700 font-size-16">دسته بندی محصول</label>
                                            <select class="custom-select form-control" id="location3" name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label class="font-weight-700 font-size-16">قیمت</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">تومان</div>
                                                <input type="text" class="form-control" placeholder="270" name="price" value="{{old('price')}}"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">تخفیف</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                <input type="number" min="0" max="100" class="form-control" placeholder="میزان تخفیف را وارد کنید" name="discount"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">توضیحات محصول</label>
                                            <textarea class="form-control p-20" rows="4" name="description" placeholder="توضیحات محصول را وارد کنید.">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
{{--                                اپلود تصویر --}}
{{--                                <div class="row">--}}
{{--                                    <!--/span-->--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <h4 class="box-title mt-20">آپلود تصویر</h4>--}}
{{--                                        <div class="product-img text-left">--}}
{{--                                            <img src="{{asset('admin/images/product/product-9.png')}}" alt="">--}}
{{--                                            <div class="btn btn-rounded btn-info mb-20">--}}
{{--                                                <span>آپلود یک تصویر دیگر</span>--}}
{{--                                                <input type="file" class="upload">--}}
{{--                                            </div>--}}
{{--                                            <button class="btn btn-rounded btn-success">ویرایش</button>--}}
{{--                                            <button class="btn btn-rounded btn-danger">حذف</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="form-actions mt-10">
                                <button type="submit" class="btn btn-rounded btn-primary"><i class="fa fa-check"></i> ذخیره</button>
                                <button type="reset" class="btn btn-rounded btn-danger">لغو</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
<!-- Site wrapper -->







