@extends('admin.layouts.app')

@section('title' ,'لیست سفارشات ')

@section('links')
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                @include('partials.alerts')

                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="productorder" class="table table-hover no-wrap product-order" data-page-size="10">
                                <thead>
                                <tr>
                                    <th>مشتری</th>
                                    <th>شماره سفارش</th>
                                    <th>تعداد اقلام</th>
                                    <th>مبلغ فاکتور</th>
                                    <th>تاریخ</th>
                                    <th>نوع پرداخت</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($orders->count()>1)
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->user->firstname.' '.$order->user->lastname}}</td>
                                            <td>#{{$order->id}}</td>
                                            <td>{{$order->products()->count()}}</td>
                                            <td>{{number_format($order->amount)}} تومان</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->payment_method}}</td>
                                            <td>
                                                <span class="badge badge-pill {{$order->payment->status? 'badge-success':'badge-warning'}} ">{{$order->payment_status}}</span>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.order.edit',$order->id)}}" class="text-info mr-10" data-toggle="tooltip" data-original-title="ویرایش">
                                                    <i class="ti-marker-alt"></i>
                                                </a>
                                                <a href="{{route('admin.order.show',$order->id)}}" class="text-success mr-10" data-toggle="tooltip"
                                                   data-original-title="جزییات سفارش">
                                                    <i class="ti-receipt"></i>
                                                </a>


                                                <a onclick="event.preventDefault();document.getElementById('delete_order_{{$order->id}}').submit()"
                                                   class="text-danger mr-10" data-toggle="tooltip" data-original-title="حذف سفارش">
                                                    <i class="ti-trash"></i>
                                                </a>

                                                <form action="{{route('admin.order.destroy',$order->id)}}" method="post" id="delete_order_{{$order->id}}">
                                                    @csrf
                                                    @method('delete')
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">هیچ فاکتوری برای نمایش وجود ندارد.</td>
                                    </tr>
                                @endif


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
