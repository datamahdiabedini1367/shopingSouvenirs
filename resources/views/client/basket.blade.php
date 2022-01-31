@extends('client.layouts.app')

@section('title' ,'سبد خرید')

@section('links')
    <link rel="stylesheet" href="{{asset('client/assets/css/owl.carousel.min.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script>
@endsection


@section('content')


    <section class="inner-page" id="cart-page">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                <h1>سبد خرید</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
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
                <div class="col-12">
                    <div class="content">
                        <div class="row">
                            @include('partials.alerts')
                            <div class="col-12 col-lg-9">
                                <div id="cart-products">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 py-3">
                                                <div class="pb-3" id="return-to-shop">می‌خواهید محصولات دیگری اضافه کنید؟
                                                    <a href="{{route('home')}}">
                                                        بازگشت به فروشگاه
                                                    </a>
                                                </div>
                                                @if($items->count()>0)
                                                    <div class="d-none d-md-block">
                                                        <div class="row my-2" id="heading">
                                                            <div class="col-4">
                                                                <div>کالا</div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div>قیمت واحد</div>
                                                            </div>
                                                            <div class="col-2 pl-4">
                                                                <div>تعداد</div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div>تخفیف</div>
                                                            </div>
                                                            <div class="col-2 pr-0">
                                                                <div class="pr-3">قیمت نهایی</div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Order Product Record -->

                                                    @foreach($items as $product)
                                                        <div class="row product">
                                                            <div class="col-12 col-md-4">
                                                                <div class="row">
                                                                    <div class="col-2 col-md-4 pl-0">
                                                                        <img src="{{$product->image}}" alt="{{$product->name}}" width="30px" height="30px">
                                                                    </div>
                                                                    <div class="col-10 col-md-8">
                                                                        <a href="{{route('client.product.show_detail' ,$product->slug)}}" target="_blank">
                                                                            <div class="title pt-2">{{$product->name}}</div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-md-2">
                                                                <div class="d-md-none font-weight-bold">قیمت</div>
                                                                <div class="pt-1"><span class="product-encoded-54434312975">{{$product->price_formated}}</span> <span>تومان</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-md-2 pl-4 pr-0 pr-md-3">
                                                                <div class="d-md-none font-weight-bold">تعداد</div>
                                                                <div class="input-group mb-3 order-number">
                                                                    {{$product->quantity}}
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-md-2">
                                                                <div class="d-md-none font-weight-bold">تخفیف</div>
                                                                <div class="pt-1"><span class="product-discount">{{$product->percent}}</span> <span>%</span></div>
                                                            </div>
                                                            <div class="col-6 col-md-2 pr-0">
                                                                <div class="d-md-none font-weight-bold">قیمت با تخفیف</div>
                                                                <div class="pt-1 pr-2 bg-light">
                                                                <span class="product-total">
                                                                    {{number_format($product->price_with_discount * $product->quantity)}}
                                                                </span>
                                                                    <span>تومان</span>
                                                                </div>
                                                                <a href="{{route('basket.destroy' ,$product->id)}}" class="product-remove btn-remove-from-basket"
                                                                   data-id="{{$product->id}}">
                                                                    <div class="small pl-2"><i class="fa fa-times"></i> حذف</div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                    @endforeach
                                                @else
                                                    <div class="d-none d-md-block text-center">سبد خرید شما خالی می باشد.</div>
                                            @endif
                                                <div class="row product">
                                                    <div class="col-12">
                                                        <a href="{{route('basket.clear')}}" class="product-remove btn-remove-from-basket" data-id="all">
                                                            <div class="float-end small pl-2 font-weight-bold">خالی کردن سبد</div>
                                                        </a>
                                                    </div>
                                                </div>

                                            <!-- Order Product Record -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 mt-2 mt-lg-0 pr-3 pr-lg-0">

                                @include('client.summery')
                                <a href="{{route('basket.checkout.form')}}"
                                   class="btn  btn-sm btn-success btn-lg w-100 d-block">@lang('payment.confirm and continue')</a>
                            </div>
                            <!-- Suggested Products -->
                            <!-- /Suggested Products -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
