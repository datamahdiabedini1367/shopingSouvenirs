@extends('admin.layouts.app')

@section('title' ,"ویرایش محصول ")

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">ویرایش محصول </h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش</li>
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
                        <h4 class="box-title">ویرایش محصول</h4>
                    </div>
                    <div class="box-body">
                        <form action="{{route('admin.products.update',$product)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label class="font-weight-700 font-size-16">نام محصول</label>
                                            <input type="text" class="form-control" placeholder="نام محصول را وارد کنید"
                                                   name="name" value="{{$product->name}}">
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <label class="font-weight-700 font-size-16" for="category_id">دسته بندی محصول</label>
                                        <select class="custom-select form-control" id="category_id" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>
                                                    {{$category->name}}
                                                </option>
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
                                            <input type="text" class="form-control" placeholder="قیمت را وارد کنید"
                                                   name="price" value="{{$product->price}}"></div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-700 font-size-16">تخفیف</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-cut"></i></div>
                                            <input type="number" min="0" max="100" class="form-control" value="{{$product->percent}}"
                                                   placeholder="میزان تخفیف را وارد کنید" name="percent"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-700 font-size-16">موجودی در انبار</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-cut"></i></div>
                                            <input type="number" min="0"  class="form-control" value="{{$product->stock}}"
                                                   placeholder="موجودی انبار را وارد کنید" name="stock"></div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-weight-700 font-size-16">توضیحات محصول</label>
                                        <textarea class="form-control p-20" rows="4" name="description"
                                                  placeholder="توضیحات محصول را وارد کنید.">{{$product->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="form-actions m-10">
                        <button type="submit" class="btn btn-rounded btn-primary"><i class="fa fa-check"></i> ذخیره</button>
                        <button type="reset" class="btn btn-rounded btn-danger">لغو</button>

                    </div>

                    <div class="row col-12 m-5 font-size-16">
                        @include('partials.validation-errors')
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







