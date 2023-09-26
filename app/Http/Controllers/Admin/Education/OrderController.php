<?php

namespace App\Http\Controllers\Admin\Education;

use App\Assistants\Payment\PaymentService;
use App\Http\Controllers\Controller;
use App\Models\Education\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $service;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
        $this->middleware('can:manage-payment');
    }

    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function pay($id)
    {
        $order = Order::findOrFail($id);
        $this->service->markAsPaid($id);
        $order->group->reduceFreePlaces();

        return redirect()->back();
    }
}
