@extends('client.profile.profile_master')

@section('profile_title')
    سفارشات
@endsection


@section('profile_content')


    <!-- Factors List -->
    @foreach($orders as $order)

        <div class="custom-container  order mb-2" id="order-panel">
            <div class="row pt-2 px-3">
                <div class="col-12 col-sm-6"><h2>سفارش شماره {{$order->id}}</h2></div>
                <div class="col-12 col-sm-6 text-sm-end"><span>{{$order->created_at}}</span> - <span>پرداخت شده</span></div>
            </div>
            <hr>
            <div class="container">
                <div class="row py-2">
                    <div class="col-12">
                        <div>
                            <div class="header">
                                <div class="total py-1"><span>مبلغ کل فاکتور:</span> {{$order->amount}} تومان</div>
                            </div>
                            <div class="container products px-0">
                                <div class="row">
                                    <!-- Order Record -->


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
                                                <div>قیمت با تخفیف</div>
                                            </div>
                                            <div class="col-2 pr-0">
                                                <div class="pr-3">قیمت نهایی</div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($order->products as $product)
{{--                                        <span class="col-12 col-sm-6 col-lg-4 col-xl-3 px-1">--}}
{{--                                            <a href="#" target="_blank"><!--لینک به محصول مورد نظر-->--}}
{{--                                                <div class="encoded-54554322">--}}
{{--                                                    <div class="image" style="background-image: url('{{asset($product->image)}}')"></div>--}}
{{--                                                    <div class="text-center px-1 px-sm-3">--}}
{{--                                                        <h2>{{$product->name}}</h2>--}}
{{--                                                        <div class="number">کد محصول: {{$product->id}} </div>--}}
{{--                                                        <div class="number">تعداد: {{$product->pivot->quantity}} عدد</div>--}}
{{--                                                        <div class="encoded-54434312975">مبلغ: {{$product->price_with_discount * $product->pivot->quantity}} تومان</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </span>--}}
{{------------------------------------------------------------------------------------------}}

                                        <!-- Order Product Record -->
                                        <div class="row product">
                                            <div class="col-12 col-md-4">
                                                <div class="row">
                                                    <div class="col-2 col-md-4 pl-0">
                                                        <img src="{{asset($product->image)}}" alt="" width="20px" height="20px">
                                                    </div>
                                                    <div class="col-10 col-md-8">
                                                        <a href="{{route('client.product.show_detail' , $product->slug)}}" target="_blank"><div class="title pt-2">{{$product->name}}</div></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="pt-1"><span >{{$product->price_formated}}</span> <span>تومان</span></div>
                                            </div>
                                            <div class="col-6 col-md-2 pl-4 pr-0 pr-md-3">
                                                <div class="input-group mb-3 ">
                                                    <div class="pt-1"><span >{{$product->pivot->quantity}}</span> <span></span></div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2">
                                                <div class="pt-1"><span class="product-discount">{{number_format($product->price_with_discount)}}</span> <span>تومان</span></div>
                                            </div>
                                            <div class="col-6 col-md-2 pr-0">
                                                <div class="d-md-none font-weight-bold">قیمت نهایی</div>
                                                <div class="pt-1 pr-2 bg-light"><span class="product-total">{{number_format($product->price_with_discount * $product->pivot->quantity)}}</span> <span>تومان</span></div>
                                            </div>
                                        </div>
                                        <hr>
                                @endforeach
                                <!-- /Order Record -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- /Factors List -->
@endsection
