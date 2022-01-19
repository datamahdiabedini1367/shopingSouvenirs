<h3>جزییات سفارش</h3>
سفارش شما با شماره
{{$order->id}}
ثبت شد.

لیست سفارش های شما به صورت زیر میباشد :
<table  style="border:1px solid #dee2e6;width:100%;margin-bottom:1rem;background-color:transparent; display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar">
    <thead>
    <tr>
        <td>ردیف</td>
        <td>نام کالا</td>
        <td>تعداد</td>
        <td>قیمت واحد</td>
        <td>قیمت مبلغ کل</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($order->products as $product)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->pivot->quantity}}</td>
            <td>{{number_format($product->price)}}</td>
            <td>{{number_format($product->pivot->quantity * $product->price)}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="4">جمع کل به همراه هزینه ارسال</td>
        <td>{{number_format($order->payment->amount)}} </td>
    </tr>
    </tbody>

</table>
