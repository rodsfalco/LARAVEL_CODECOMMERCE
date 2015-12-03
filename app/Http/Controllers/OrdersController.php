<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class OrdersController extends Controller
{
    private $orderModel;

    public function __construct(Order $orderModel) {
        $this->orderModel = $orderModel;
    }

    public function index() {
        $orders = $this->orderModel->all();

        return view('orders.index', compact('orders'));
    }

    public function trocarStatus($id) {
        $order = $this->orderModel->find($id);

        $order->status = $order->status + 1;
        $order->save();

        return redirect()->route('orders.index');
    }

    public function cancelar($id) {
        $order = $this->orderModel->find($id);

        $order->status = '5';
        $order->save();

        return redirect()->route('orders.index');
    }

}
