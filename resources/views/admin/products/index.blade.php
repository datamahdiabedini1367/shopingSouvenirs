@extends('admin.layouts.app')

@section('title' ,'لیست محصولات')

@section('links')
@endsection

@section('content')



<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">محصولات</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                        <li class="breadcrumb-item active" aria-current="page">محصولات</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="right-title bg-white rounded-circle">
            <a href="{{route('admin.products.create')}}" class="btn no-caret"> <i class="mdi mdi-plus"></i></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    @include("partials.alerts")
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="products" class="table table-hover no-wrap product-order" data-page-size="10">
                            <thead>
                            <tr>
                                <th>دسته بندی</th>
                                <th>نام محصول</th>
                                <th>قیمت</th>
                                <th>موجودی در انبار</th>
                                <th>تخفیف</th>
                                <th>تاریخ ثبت</th>
                                <th>عکس</th>
                                <th>اقدامات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->category_name}}</td>
                                    {{--                                                'name', 'description', 'price', 'stock'--}}
                                    <td>{{$product->name}}</td>
                                    <th>{{number_format($product->price)}}</th>
                                    <th>{{$product->stock}}</th>
                                    <th>{{$product->validCoupon}}</th>
                                    <th>{{$product->created_at}}</th>
                                    <td><img src="{{asset('admin/images/product/product-1.png')}}" alt="product" width="80"></td>
                                    <td>
                                        <a href="{{route('admin.products.update' ,['product'=>$product])}}" class="text-info mr-10" data-toggle="tooltip"
                                           data-original-title="ویرایش">
                                            <i class="ti-marker-alt"></i>
                                        </a>
                                        <a href="{{route('admin.products.destroy' ,['product'=>$product])}}" class="text-danger" data-original-title="حذف"
                                           data-toggle="tooltip">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

@endsection





@section('scripts')
    <script src="{{asset('admin/js/pages/data-table.js')}}"></script>
@endsection

