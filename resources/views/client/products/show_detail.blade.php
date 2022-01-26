@extends('client.layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('client/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/product-gallery.css')}}">
    <link rel="stylesheet" href="{{asset('client/ajax/libs/photoswipe/4.1.3/photoswipe.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('client/assets/js/nav-tabs.js')}}"></script>
    <script src="{{asset('client/assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('client/ajax/libs/photoswipe/4.1.3/photoswipe.min.js')}}"></script>
    <script src="{{asset('client/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{asset('client/assets/js/product-gallery.js')}}"></script>
@endsection

@section('title')
@endsection

@section('content')


    <section class="inner-page" id="product-page">
        <div class="container-fluid" id="page-hero">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-0">
                                {{--                                <h1>گوشی موبایل سامسونگ مدل Galaxy A21s</h1>--}}
                                <h1>{{$product->name}}</h1>
                                {{--                                <p>دارای قابلیت دو سیم کارته و حافظه 128 گیگا بایت</p>--}}
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">صفحه نخست</a></li>
                                        <li class="breadcrumb-item"><a href="products.html">فروشگاه</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{$product->category_name}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @include('partials.alerts')
            <div class="row">
                <div class="col-12">
                    <div class="content">
                        <div class="row">
                            <div class="col-12 col-lg-5 px-lg-0">
                                <div class="swiper-container gallery-top">
                                    <!-- Additional required wrapper -->
                                    <ul class="swiper-wrapper">
                                        <!-- Slides -->
                                        @foreach($product->pictures as $picture)
                                            <li id="1" class="swiper-slide">
                                                <a id="{{$picture->id}}" href="{{asset($picture->address)}}" itemprop="contentUrl" data-size="900x710">
                                                    <img src="{{asset($picture->address)}}" itemprop="thumbnail" alt="{{$product->name}}">
                                                </a>
                                            </li>
                                    @endforeach

                                    <!-- /Slides -->
                                    </ul>
                                    <!-- If we need navigation buttons -->
                                    <div title="قبلی" class="swiper-button-prev swiper-button-black"></div>
                                    <div title="بعدی" class="swiper-button-next swiper-button-black"></div>
                                </div>

                                <!-- Swiper -->
                                <div class="swiper-container gallery-thumbs">
                                    <div class="swiper-wrapper">
                                        @foreach($product->pictures as $picture)
                                            <div class="swiper-slide" style="background-image:url('{{asset($picture->address)}}')"></div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="pswp__bg"></div>
                                    <div class="pswp__scroll-wrap">
                                        <div class="pswp__container">
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                        </div>
                                        <div class="pswp__ui pswp__ui--hidden">
                                            <div class="pswp__top-bar">
                                                <div class="pswp__counter"></div>
                                                <button class="pswp__button pswp__button--close" title="بستن (Esc)"></button>
                                                <button class="pswp__button pswp__button--fs" title="تمام صفحه"></button>
                                                <button class="pswp__button pswp__button--zoom" title="بزرگنمایی"></button>
                                                <div class="pswp__preloader">
                                                    <div class="pswp__preloader__icn">
                                                        <div class="pswp__preloader__cut">
                                                            <div class="pswp__preloader__donut"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="pswp__button pswp__button--arrow--left" title="قبلی"></button>
                                            <button class="pswp__button pswp__button--arrow--right" title="بعدی"></button>
                                            <div class="pswp__caption">
                                                <div class="pswp__caption__center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 mt-5 mt-lg-0 pl-lg-0" id="product-intro">
                                <a href="product.html">
                                    <h1>{{$product->name}}</h1>
                                </a>

                                <div class="encoded-54434312975-container py-2">
                                    @if($product->validCoupon->count()>=1)
                                        <span class="pre-encoded-54434312975">   {{$product->price_formated}}   </span>
                                        <span class="encoded-54434312975">   {{number_format($product->price_with_discount)}}<span>تومان   </span></span>
                                    @else
                                        <span class="encoded-54434312975">{{$product->price_formated}} <span>تومان</span></span>
                                    @endif
                                    @if($product->validCoupon->count()>=1)
                                        <div class="badge badge-danger font-weight-light m-1 py-1 px-2 text-danger">  {{$product->percent}}%</div>
                                    @endif
                                </div>
                                <p>
                                    {{$product->description}}
                                </p>
                                <hr>


                                <form action="{{route('basket.add' , $product->id)}}" method="post" class="form-inline">
                                    @csrf
                                    <div class="variables">
                                        <div class="title">گزینه های موجود:</div>
                                        <div class="row">
                                            <div class="col-12 col-sm-4 col-lg-3">
                                                <div class="variable">
                                                    <div class="sub-title pt-2 pb-3">تعداد موجود در انبار</div>
                                                    <span class="variable">{{$product->stock}}</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-lg-3">
                                                <div class="variable">
                                                    <div class="sub-title pt-2 pb-2">تعداد درخواستی</div>
                                                    <select name="quantity" class="form-control">
                                                        @for($i=1 ;$i<=$product->stock;$i++)
                                                            <option value="{{$i}}" {{$i == old('quantity')?'selected':''}}>{{$i}} عدد</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cta-container pt-3 pt-md-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success px-4 px-lg-2 px-xl-4 btn-add-to-basket"><i class="fa fa-shopping-cart"></i>@lang('payment.add to basket')</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Share Links -->
                                <!-- Share Links -->
                            </div>

                            <!-- Nav Tabs -->
                            <div class="col-12">
                                <div id="product-nav-tabs">
                                    <div class="row pt-3 px-md-3">
                                        <div class="col-12">
                                            <div id="tabs-panel">
                                                <button class="tab-item tablink px-3 selected" onclick="openTab(event,'html-tab')">نقد و بررسی</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 pt-2 px-0 px-lg-0">
                                                <!-- HTML Tab -->
                                                <div id="html-tab" class="tabs-container text-justify p-0 p-md-3">
                                                    <p>
                                                        {{$product->description}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Nav Tabs -->

                        <!-- Suggested Products -->
                        <div class="col-12 pt-5" id="suggested-products">
                            <div class="title py-3 text-center">محصولات مرتبط</div>
                            <div class="owl-carousel products-carousel">
                                <!-- Product Item -->
                                @foreach($product->related_product as $relatedProduct)
                                <div class="encoded-54554322 item">
                                    <a href="{{route('client.product.show_detail' , $relatedProduct->slug)}}">
                                        <div class="image" style="background-image: url('{{$relatedProduct->image}}')"></div>
                                    </a>
                                    <div class="encoded-544540934312975 p-3">
                                        <a href="{{route('client.product.show_detail' , $relatedProduct->slug)}}">
                                            <h2>{{$relatedProduct->name}}</h2></a>

                                        @if($relatedProduct->validCoupon->count()>=1)
                                            <span class="pre-encoded-54434312975">   {{$relatedProduct->price_formated}}   </span>
                                            <span class="encoded-54434312975">   {{number_format($relatedProduct->price_with_discount)}}<span>تومان   </span></span>
                                        @else
                                            <span class="encoded-54434312975">{{$relatedProduct->price_formated}} <span>تومان</span></span>
                                        @endif
                                        @if($relatedProduct->validCoupon->count()>=1)
                                            <div class="badge badge-danger font-weight-light m-1 py-1 px-2 text-danger">  {{$relatedProduct->percent}}%</div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                                <!-- /Product Item -->

                            </div>
                        </div>
                        <!-- /Suggested Products -->
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
