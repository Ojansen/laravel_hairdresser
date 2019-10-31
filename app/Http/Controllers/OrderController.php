<?php

namespace App\Http\Controllers;

use App\Hairdresser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Order;
use App\User;

class OrderController extends Controller
{
    public function NewOrder(Request $request)
    {
        if($request->isMethod('get')) {
            $user = Auth::user();
            $orders = Order::all();
            $hairdressers = Hairdresser::all();
            return view('order.new', compact('user', 'orders', 'hairdressers'));
        }
        elseif ($request->isMethod('post')) {

        }
    }
}
