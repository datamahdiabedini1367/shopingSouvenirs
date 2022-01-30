@extends('client.layouts.app')

@section('title')
    سوغات مارکت
@endsection

@section('content')
    <section class="inner-page" id="products-page" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                <h1>فروشگاه سوغات مارکت</h1>
                                <p>هر آنچه نیاز دارید در این فروشگاه موجود است</p>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        {{--                                    <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>--}}
                                        <li class="breadcrumb-item active" aria-current="page">محصولات</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @include('partials.alerts')
                <div class="col-12">
                    <div class="content">
                        <div class="row">
                            <div class="col-12 col-lg-3 px-3 px-lg-0">
                                <!-- Side Panel -->
                                <form action="{{route('client.products.search')}}" method="get" >

                                <div class="accordion filters-container">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                گروه های محصولات
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                                            <div class="accordion-body">

                                                @foreach($categories as $category)
                                                    <div class="form-group">
                                                        <input type="checkbox" id="category{{$category->id}}" name="category[]" value="{{$category->id}}">
                                                        <label for="category1">{{$category->name}}</label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="accordion filters-container mt-3">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="true"
                                                        aria-controls="collapseTwo">
                                                    محدوده قیمت
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-6 text-center encoded-54434312975-range mt-3">
                                                            <div>از</div>
                                                            <input type="number" id="encoded-54434312975-range-to" name="min_price" value="" class="form-control"/>

                                                            <div>تومان</div>
                                                        </div>
                                                        <div class="col-6 text-center encoded-54434312975-range mt-3">
                                                            <div>تا</div>
                                                            <input type="number" id="encoded-54434312975-range-to" name="max_price" class="form-control" value=""/>
                                                            <div>تومان</div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="accordion filters-container mt-3">
                                        <div class="accordion-item">
                                            <div id="collapseThree" class="accordion-collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body pb-2">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="only-available" name="available" value="1">
                                                        <label for="only-available">فقط کالاهای موجود</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center py-2">
                                                <button type="submit" class="btn btn-warning">اعمال فیلتر </button>
                                            </div>
                                        </div>

                                    </div>


                                </form>
                                <!-- /Side Panel -->
                            </div>
                            {{--                            <div class="col-12 col-lg-12 px-0 pl-lg-0 pr-lg-2 mt-2 mt-lg-0">--}}
                            <div class="col-12 col-lg-9 px-0 pl-lg-0 pr-lg-2 mt-2 mt-lg-0">
                                <!-- Filters -->
                                <div id="order-filters">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-sm-10 my-1">
                                                {{--                                                <span class="d-block d-sm-inline-block">مرتب سازی بر اساس:</span>--}}
                                                {{--                                                <span class="order-filter d-block d-sm-inline-block active">جدیدترین</span>--}}
                                                {{--                                                <span class="order-filter d-block d-sm-inline-block">پربازدیدترین</span>--}}
                                                {{--                                                <span class="order-filter d-block d-sm-inline-block">پرفروش‌ترین</span>--}}
                                                {{--                                                <span class="order-filter d-block d-sm-inline-block">ارزان‌ترین</span>--}}
                                            </div>
                                            <div class="col-12 col-sm-2 pt-1 text-end">
                                                {{--                                            <span>--}}
                                                {{--                                                <a href="products-list.html" class="products-view-type"><i class="fa fa-th-list"></i></a>--}}
                                                {{--                                                <a href="products.html" class="products-view-type active"><i class="fa fa-th"></i></a>--}}
                                                {{--                                            </span>--}}
                                                {{--                                                &nbsp;|&nbsp;--}}
                                                <span>{{$products->count()}} کالا</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Filters -->
                                <div class="mt-2" id="pager">
                                    <div class="container">
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 gx-md-4">
                                            <!-- Products -->
                                            @foreach($products as $product)
                                                <div class="col">
                                                    <!-- Product Box -->
                                                    <div class="encoded-54554322">
                                                        <a href="{{route('client.product.show_detail' , $product->slug)}}">
                                                            <div class="image" style="background-image: url('{{$product->image}}')"></div>
                                                        </a>
                                                        <div class="encoded-544540934312975 p-3">
                                                            {{--                                                            <div class="category">--}}
                                                            {{--                                                                <a href="products.html">گوشی موبایل</a>--}}
                                                            {{--                                                                &nbsp;/&nbsp;--}}
                                                            {{--                                                                <a href="products.html">سامسونگ</a>--}}
                                                            {{--                                                            </div>--}}
                                                            <a href="{{route('client.product.show_detail' , $product->slug)}}"><h2>{{$product->name}}</h2></a>
                                                            <div>
                                                                @if($product->validCoupon->count()>=1)
                                                                    <span
                                                                        class="pre-encoded-54434312975 text-decoration-line-through mx-2">   {{$product->price_formated}}   </span>
                                                                    <span
                                                                        class="encoded-54434312975">   {{number_format($product->price_with_discount)}}<span>تومان   </span></span>
                                                                @else
                                                                    <span class="encoded-54434312975 mx-2">{{$product->price_formated}} <span>تومان</span></span>
                                                                @endif

                                                            </div>

                                                            <div>
                                                                <a class="btn btn-success" href="{{route('client.product.show_detail' , $product->slug)}}">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    مشاهده و خرید
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Product Box -->
                                                </div>
                                        @endforeach
                                        <!-- /Products -->
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="pagination-bg">
                                                <ul class="pagination justify-content-center pagination-sm"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
