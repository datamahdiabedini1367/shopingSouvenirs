@inject('cost' , 'App\Support\Cost\Contracts\CostInterface')


    <div id="factor">
        <div class="container">
            @foreach($cost->getSummery() as $description =>$price)

                <div class="row py-2">
                    <div class="col-6">
                        <div>{{$description}}</div>
                    </div>
                    <div class="col-6">
                        <div><span id="factor-total-encoded-54434312975">{{number_format($price)}} </span> @lang('payment.toman')</div>
                    </div>
                </div>
            @endforeach


            <div class="row py-2">
                <div class="col-5">
                    <div>@lang('payment.coupon')</div>
                </div>
                <div class="col-7">
                    <div>
                        @if(session()->has('coupon'))

                            <form action="{{route('coupon.remove')}}" method="get">
                                <div class="input-group ">
                                    <span>{{session()->get('coupon')->code}}</span>
                                    <span class="mx-2">
                                    <button type="submit" class="btn btn-sm btn-outline-danger ">
                                    حذف
                                    </button>
                                </span>
                                </div>
                            </form>
                        @else

                            <form action="{{route('coupon.apply')}}" method="post">
                                @csrf
                                <div class="input-group ">
                                    <input type="text" name="coupon" id="coupon" class="form-control form-control-sm" placeholder="کد تخفیف را وارد کنید">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary btn-sm" id="coupon-apply">@lang('payment.apply')</button>
                                    </div>
                                </div>
                            </form>

                        @endif
                    </div>
                </div>
            </div>

            <div class="row py-2">
                <div class="col-6">
                    <div>@lang('payment.basket total')</div>
                </div>
                <div class="col-6">
                    <div>
                        <span id="factor-total-encoded-54434312975">
                            {{number_format($cost->getTotalCost())}}
                        </span>
                        @lang('payment.toman')
                    </div>
                </div>
            </div>





        </div>
    </div>




