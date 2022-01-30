@extends('admin.layouts.app')

@section('title' ,'نمایش جزییات سفارش')

@section('links')

@endsection
@section('scripts')
    <script src="{{asset('admin/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor_plugins/JqueryPrintArea/demo/jquery.PrintArea.js')}}"></script>
    <script src="{{asset('admin/js/pages/invoice.js')}}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">صورتحساب</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">صورتحساب</li>
                                    <li class="breadcrumb-item active" aria-current="page">صورتحساب  {{$order->user->firstname.' '.$order->user->lastname}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="pad margin no-print">--}}
{{--                <div class="callout callout-success" style="margin-bottom: 0!important;">--}}
{{--                    <h4><i class="fa fa-info"></i> توجه:</h4>--}}
{{--                    این صفحه برای چاپ افزایش یافته است. برای تست، روی دکمه چاپ در پایین فاکتور کلیک کنید.--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Main content -->
            <section class="invoice printableArea">

                <!-- title row -->
                <div class="row rtl">
                    <div class="col-12">
                        <div class="bb-1 clearFix">
                            <div class="text-right pb-15">
                                <button class="btn btn-rounded btn-success" type="button"> <span><i class="fa fa-print"></i> ذخیره</span> </button>
                                <button id="print2" class="btn btn-rounded btn-warning" type="button"> <span><i class="fa fa-print"></i> چاپ</span> </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="page-header">
                            <h2 class="d-inline"><span class="font-size-30">صورتحساب  {{$order->user->firstname.' '.$order->user->lastname}}</span></h2>
                            <div class="pull-right text-right">
                                <h3>{{$order->created_at}}</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info rtl" >
                    <!-- /.col -->
                    <div class="col-md-6 invoice-col text-right">
                        <strong>نام مشتری</strong>
                        <address>
                            <strong class="text-blue font-size-24">{{$order->user->firstname.' '.$order->user->lastname}}</strong><br>
                            <strong>آدرس ارسال :
                         {{$order->user->address_default()->state .'\\'.$order->user->address_default()->city}}  {{$order->user->address_default()->address}} </strong><br>
                            <strong>تلفن: {{$order->user->mobile}} &nbsp;&nbsp;&nbsp;&nbsp; ایمیل: {{$order->user->email}}</strong><br>
                            <strong>شماره تماس تحویل گیرنده: {{$order->user->address_default()->phone_number}} </strong>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-12 invoice-col mb-15">
                        <div class="invoice-details row no-margin">
                            <div class="col-md-6 col-lg-3"><b>فاکتور </b>#{{$order->id}}</div>
                            <div class="col-md-6 col-lg-3"><b>شماره پیگیری:</b> {{$order->payment->ref_num}}</div>
                            <div class="col-md-6 col-lg-3"><b>مبلغ پرداختی:</b> {{$order->payment->amount}}</div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive text-right rtl">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>کد کالا</th>
                                <th>نام کالا</th>
                                <th class="text-right">قیمت</th>
                                <th class="text-right">تعداد</th>
                                <th class="text-right">تخفیف</th>
                                <th class="text-right">جمع کل</th>
                            </tr>
                            @foreach($order->products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price_formated}} تومان</td>
                                <td class="text-right">{{$product->pivot->quantity}} </td>
                                <td class="text-right">{{$product->discount}} %</td>
                                <td class="text-right">{{$product->price_with_discount}} تومان</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-12 text-right">
                        <p class="lead"><b>نوع پرداخت:</b><span class="text-danger"> {{$order->payment_method}} </span></p>
                        <p class="lead"><b>نوع پرداخت</b><span class="text-danger"> 14/08/2018 </span></p>

                        <div>
                            <p>زیر - مجموع مقدار  :  3,592.00 تومان</p>
                            <p>مالیات (18%)  :  646.56 تومان</p>
                            <p>حمل و نقل  :  110.44 تومان</p>
                        </div>
                        <div class="total-payment">
                            <h3><b>مجموع :</b> 4,349.00 تومان</h3>
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
