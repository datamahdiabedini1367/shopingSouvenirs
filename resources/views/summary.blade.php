@inject('cost' , 'App\Support\Cost\Contracts\CostInterface')

<div class="card bg-light">
    <div class="card-body">
        <h4>@lang('payment.cart summary')</h4>
        <hr>
        <div class="well">
            <table class='table '>
                @foreach($cost->getSummery() as $description =>$price)
                    <tr>
                        <td>{{$description}}</td>
                        <td> {{number_format($price)}} @lang('payment.toman')</td>
                    </tr>
                @endforeach

                <tr>
                    <td>@lang('payment.coupon')</td>
                    <td >
                        @if(session()->has('coupon'))

                            <form action="{{route('coupon.remove')}}" method="get">
                                <div class="input-group mb-3">
                                    <span>{{session()->get('coupon')->code}}</span>
                                    <span class="ml-3 border-1">
                                    <button type="submit" class="btn btn-sm btn-danger"  >@lang('payment.remove')</button>
                                </span>
                                </div>
                            </form>
                        @else

                            <form action="{{route('coupon.apply')}}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="coupon" id="coupon" class="form-control" placeholder="کد تخفیف را وارد کنید" >
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"  id="coupon-apply">@lang('payment.apply')</button>
                                    </div>
                                </div>
                            </form>

                        @endif
                    </td>
                </tr>


                <tr>
                    <td>@lang('payment.basket total')</td>
                    <td> {{number_format($cost->getTotalCost())}} @lang('payment.toman')</td>
                </tr>
            </table>
        </div>
    </div>
</div>

