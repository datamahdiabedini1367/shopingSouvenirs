@extends('admin.layouts.app')


@section('title' , 'مدیریت تصاویر محصولات')


@section('links')
    <!-- dropzone -->
    <link rel="stylesheet"
          href="{{asset('admin/assets/vendor_components/dropzone/dropzone.css')}}">
@endsection




@section('content')






    <!-- Main content -->
    <section class="content">
        @include('partials.alerts')

        <div class="box">
            <div class="box-header">
                <h4 class="box-title"> آپلود تصاویر {{$product->name}}</h4>
                <h6 class="box-subtitle">شما می توانید همزمان چند فایل تصویر را بارگذاری کنید.</h6>
                <h6 class="box-subtitle">توجه کنید که اولین تصویر آپلود شده به عنوان تصویر اصلی محصول در نظر گرفته می شود</h6>
            </div>
            <div class="box-body">

                <form name="save-multiple-files" method="POST"
                      action="{{route('admin.product.pictures.store' ,$product)}}"
                      accept-charset="utf-8"
                      enctype="multipart/form-data">

                    @csrf
                    <div class="col-md-3">
                        <h4 class="box-title mt-20">آپلود تصویر</h4>
                        <div class="product-img text-left">
                            <div class="btn btn-rounded btn-info mb-20">
                                <span>آپلود تصویر</span>
                                <input type="file" class="upload" name="files[]" multiple>
                            </div>
                            <button class="btn btn-rounded btn-danger" type="submit">ارسال</button>
                        </div>
                    </div>

                    @include('partials.validation-errors')
                </form>


            </div>
        </div>


        <div class="box">
            <div class="box-header">
                <h4 class="box-title">تصاویر آپلود شده</h4>
            </div>
            <div class="box-body">

                <div class="row">
                    @foreach($product->pictures as $picture)

                    <div class="col-md-12 col-lg-3">
                        <div class="card">
                            <img class="card-img-top img-thumbnail" src="{{str_replace('public','/storage',$picture->path)}}" alt="Card image cap">
                            <div class="card-footer justify-content-between d-flex">
                                <ul class="list-inline mb-0 mr-2">
                                </ul>

                                <ul class="list-inline mb-0">
                                    <li>
                                        <form action="{{route('admin.product.pictures.destroy' ,$picture->id )}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="form-control btn-danger">حذف</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>


            </div>
        </div>


    </section>

@endsection





