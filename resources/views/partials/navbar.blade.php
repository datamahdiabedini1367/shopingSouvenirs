@inject('basket' , 'App\Support\Basket\Basket')

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="#">
        <img src="{{asset('img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
        آکادمی
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="auth-btn collapse justify-content-end navbar-collapse">

        <a href="{{route('basket.index')}}" class="btn btn-info mr-2">
            @lang('payment.basket') <span class="badge badge-light">
            {{$basket->itemCount()}}
        </span>
        </a>
        @guest
            <a class="btn btn-info  mr-2" href="{{route('auth.login.form')}}">ورود</a>
            <a class="btn btn-info mr-2" href="{{route('auth.register.form')}}">ثبت نام</a>
        @endguest

    </div>
</nav>
