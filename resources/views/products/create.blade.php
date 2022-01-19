@extends('layouts.app')

@section('title' , 'ثبت کالا')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9 mt-5">
            <div>
                @include('partials.alerts')
            </div>
            @include('partials.alerts')
            <div class="card">
                <div class="card-header">
                    ثبت کالا
                </div>
                <div class="card-body">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="mb-3 col-3">
                                <label for="name" class="form-label">نام کالا</label>
                                <input type="text" class="form-control" id="name" value="{{old('name')}}"
                                       placeholder="نام کالا را وارد کنید"  name="name">
                            </div>
                            <div class="mb-3 col-3">
                                <label for="price" class="form-label">قیمت کالا</label>
                                <input type="number" class="form-control" id="price" value="{{old('price')}}"
                                       placeholder="قیمت کالا را وارد کنید" name="price">
                            </div>
                            <div class="mb-3 col-3">
                                <label for="stock" class="form-label">موجودی کالا</label>
                                <input type="number" class="form-control" id="stock" value="{{old('stock')}}"
                                       placeholder="موجودی کالا را وارد کنید" name="stock">
                            </div>
                            <div class="mb-3 col-3">
                                <label for="percent" class="form-label">درصد تخفیف</label>
                                <input type="number" class="form-control" id="percent" value="{{old('percent')}}"
                                       placeholder="درصد تخفیف  را وارد کنید" min="0" max="100" name="percent" >
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-3 col-3">
                                <label for="city" class="form-label">شهر</label>
                                <input type="text" class="form-control" id="city" value="{{old('city')}}"
                                       placeholder="نام شهر را وارد کنید"  name="city" >
                            </div>
                        </div>


                        <div class="row">

                            <div class="mb-3 col-12">
                                <label for="exampleFormControlInput1" class="form-label">شرح کالا</label>
                                <textarea  class="form-control" id="exampleFormControlInput1" placeholder="شرح کالا  را وارد کنید">{{old('description')}}</textarea>
                            </div>

                        </div>


{{--                        <div class="form-group">--}}
{{--                            <div class="custom-file mb-3">--}}
{{--                                <input type="file" name="file" class="custom-file-input" id="customFile" placeholder="فایل خود را انتخاب کنید">--}}
{{--                                <label class="custom-file-label" for="customFile">فایل خود را انتخاب کنید</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="mb-3">--}}
{{--                                <input type="text" name="name" class="form-control" id="customFile" placeholder="نام کالا را وارد کنید">--}}
{{--                                <label class="custom-file-label" for="customFile">نام کالا</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="custom-control custom-checkbox">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="is-private" name="is-private">--}}
{{--                                <label class="custom-control-label" for="is-private">به صورت خصوصی آپلود شود</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <div class='text-center'>
                                <button type="submit" class="btn btn-primary">ثبت کالا </button>
                            </div>
                        </div>
                        <div class="form-group">
                            @include('partials.validation-errors')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
