@extends('admin.layouts.app')

@section('title' ,'لیست محصولات')

@section('links')
@endsection

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">دسته بندی ها</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">فروشگاه</li>
                        <li class="breadcrumb-item active" aria-current="page">دسته بندی</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="right-title bg-white rounded-circle">
            <a href="{{route('admin.categories.create')}}" class="btn no-caret"> <i class="mdi mdi-plus"></i></a>
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
                        <table id="categories" class="table table-hover no-wrap product-order" data-page-size="10">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام دسته بندی</th>
                                <th>دسته والد</th>
                                <th>اقدامات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        {{$category->parent_category_name}}
                                    </td>
                                    <td >
                                        <form action="{{route('admin.categories.destroy' ,$category->id)}}" method="post" id={{"delete_category_".$category->id}}>
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a href="{{route('admin.categories.edit' ,$category->id)}}" class="text-info " data-toggle="tooltip"
                                           data-original-title="ویرایش">
                                            <i class="ti-marker-alt"></i>
                                        </a>

                                        <span  class="text-danger " data-toggle="tooltip"
                                           data-original-title="حذف" onclick="document.getElementById('{{"delete_category_".$category->id}}').submit()">
                                            <i class="ti-trash"></i>
                                        </span>

                                        <a href="{{route('admin.category.subCategory.create' ,$category->slug)}}" class="text-info " data-toggle="tooltip"
                                           data-original-title="افزودن زیر دسته">
                                            افرودن زیر دسته
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

