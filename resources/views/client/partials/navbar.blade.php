@inject('categories' , 'App\Http\Controllers\Admin\CategoryController')
@inject('products' , 'App\Http\Controllers\Admin\ProductController')

@inject('basket' , 'App\Support\Basket\Basket')

<section id="header">
    <!-- Top NavBar -->
    <div id="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-8 d-none d-md-block">
                    {{--                    <ul>--}}
                    {{--                        <li><a href="index.html">صفحه نخست</a></li>--}}
                    {{--                        <li><a href="about.html">درباره ما</a></li>--}}
                    {{--                        <li><a href="contact.html">تماس با ما</a></li>--}}
                    {{--                    </ul>--}}
                </div>
                <div class="col-12 col-md-4 text-center text-md-end" id="top-encoded-5443654533">
                    <span>تلفن مشاوره و فروش: 09351234567</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Top NavBar -->
    <!-- Search NavBar -->
    <div id="encoded-543654765">
        <div class="container pt-1">
            <div class="row py-3 align-content-center">
                <div class="col-12 col-md-3 col-xl-2 text-center text-md-start pb-2" id="header-logo">
                    <a href="index.html">
                        <img src="{{asset('client/assets/images/logo.png')}}" alt=""> سوغات مارکت
                    </a>
                </div>
                <div class="col-12 col-md-5 col-xl-6">
                    <div id="encoded-5436543">
                        <form action="{{route('client.products.search')}}" method="get">
                        <input type="text" placeholder="جستجو کنید..." name="product_name">
                        <button type="submit" class="btn btn-sm border-0 m-0 p-0">
                            <i class="fa fa-search"></i>
                        </button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="col-12 col-md-7 col-lg-6 text-center" id="btn-login-register">
                            @guest
                                <a href="{{route('auth.login.form')}}">ورود</a> /
                                <a href="{{route('auth.register.form')}}">عضویت</a>
                            @endguest
                            @auth
                                کاربر گرامی
                                {{Auth::user()->firstname }}
                                به سایت ما خوش آمدید.
                            @endauth
                        </div>
                        <div class="col-12 col-md-5 col-lg-6">
                            <a href="{{route('basket.index')}}">
                                <div class="btn btn-warning w-100">
                                    <i class="fa fa-shopping-cart"></i>&nbsp;
                                    <span class="d-md-none d-lg-inline-block">سبد خرید</span> ({{$basket->itemCount()}})</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Search NavBar -->
    <!-- Main NavBar -->

    <div id="main-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="encoded-5456636543 dmarrow-down droopmenu-horizontal dmpos-top dmfade">
                        <div class="droopmenu-inner">
                            <div class="droopmenu-header">
                                <a href="#" class="droopmenu-toggle"><i class="dm-burg"></i></a>
                                <span class="d-md-none">منوی فروشگاه</span>
                            </div>
                            <!-- Header Mega Menu-->
                            <div class="droopmenu-nav">
                                <div class="droopmenu-nav-wrap">
                                    <div class="droopmenu-navi">
                                        <ul class="droopmenu">
                                            <li class="encoded-54566542" aria-haspopup="true">
                                                <a href="{{route('home')}}"
{{--                                                   aria-expanded="false"--}}
                                                >
                                                    <i class="fa fa-bars"></i>
                                                    &nbsp;&nbsp;محصولات
{{--                                                    <em class="droopmenu-topanim"></em>--}}
                                                </a>
{{--                                                <div class="dm-arrow"></div>--}}
{{--                                                <ul class="droopmenu-grid droopmenu-grid-9">--}}
{{--                                                    <li class="droopmenu-tabs droopmenu-tabs-vertical">--}}
{{--                                                        @if($categories->list()->count() > 0)--}}
{{--                                                            @foreach($categories->list() as $category)--}}
{{----}}
{{--                                                                @if($category->children->count() > 0)--}}
{{----}}
{{--                                                                <div class="encoded-54566653436543 droopmenu-tab" id="droopmenutab{{$category->id}}">--}}
{{--                                                                    <a class="droopmenu-tabheader" href="#">{{$category->name}}</a>--}}
{{--                                                                    <div class="droopmenu-tabcontent">--}}
{{--                                                                        <div class="droopmenu-row">--}}
{{----}}
{{--                                                                                @foreach($category->children as $oneChild)--}}
{{----}}
{{--                                                                                    <ul class="droopmenu-col droopmenu-col4">--}}
{{--                                                                                        <li><h4>{{$oneChild->name}}</h4></li>--}}
{{--                                                                                        @if($oneChild->children->count() > 0)--}}
{{--                                                                                            @foreach($oneChild->children as $twoChild)--}}
{{--                                                                                                <li><a href="{{route('client.categories.products.index' , $twoChild->id)}}">{{$twoChild->name}}</a></li>--}}
{{--                                                                                            @endforeach--}}
{{--                                                                                        @endif--}}
{{--                                                                                    </ul>--}}
{{--                                                                                @endforeach--}}
{{--                                                                            --}}{{--<ul class="droopmenu-col droopmenu-col4 d-none d-lg-inline-block">--}}
{{--                                                                            --}}{{--    <li><img src="assets/images/megamenu/megamenu-image1.png" alt=""></li>--}}
{{--                                                                            --}}{{--</ul>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                @endif--}}

{{--                                                            @endforeach--}}
{{--                                                        @endif--}}

{{--                                                    </li>--}}
{{--                                                </ul>--}}
                                            </li>


                                            <li><a href="about.html">درباره ما<em class="droopmenu-topanim"></em></a></li>
                                            <li><a href="about.html">تماس با ما<em class="droopmenu-topanim"></em></a></li>

                                            @auth
                                                <li class="encoded-54566542" aria-haspopup="true">
                                                    <a href="{{route('client.profile.show')}}" aria-expanded="false">پروفایل کاربری<em class="droopmenu-topanim"></em></a>
                                                    <div class="dm-arrow"></div>
                                                    <ul style="">
                                                        <li><a href="{{route('client.profile.show')}}">مشخصات کاربری</a></li>
                                                        <li><a href="{{route('client.profile.orders.show')}}">سفارشات</a></li>
                                                        <li><a href="{{route('client.profile.address.index')}}">آدرس ها</a></li>
{{--                                                        <li><a href="profile/favorites.html">علاقه مندی ها</a></li>--}}
                                                        <li><a href="{{route('auth.logout')}}">خروج</a></li>
                                                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </ul>
                                                </li>
                                            @endauth
                                            @role('admin')
                                            <li><a href="{{route('admin.dashboard')}}">بخش مدیریت سایت<em class="droopmenu-topanim"></em></a></li>
                                            @endrole




                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Header Menu Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main NavBar -->
</section>
