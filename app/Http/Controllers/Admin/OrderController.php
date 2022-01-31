<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new Orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Orders in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified Orders.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if ($order->status !== Order::CANCEL_ORDER){
        $order->update([
            'status'=>Order::PROCESSING,
        ]);
        }
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified Orders.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified Orders in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified Orders from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        $order->payment()->delete();
        return redirect()->back()->with('success', 'سفارش با موفقیت حذف شد');
    }

    public function cancel(Order $order)
    {
            $order->update([
                'status' => Order::CANCEL_ORDER
            ]);
            return back()->with('error', 'سفارش کنسل شد');
    }

    public function orderRegisterd()
    {
        $orders = Order::query()->where('status',Order::REGISTERED)->get();
        return $orders;

    }
}
