<?php

namespace App\Http\Controllers;

use App\Hairdresser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Order;
use App\User;

class OrderController extends Controller
{
    public function NewOrder(Request $request, $id = null)
    {
        if($request->isMethod('get')) {
            $choice = False;
            $user = Auth::user();
            $orders = Order::all();
            $hairdressers = Hairdresser::all();

            if($id != null) {
                $hairdresser = Hairdresser::find($id);
                $choice = True;
                return view('order.new', compact('hairdresser', 'choice'));
            }

            return view('order.new', compact('user', 'orders', 'hairdressers', 'choice'));
        }
        elseif ($request->isMethod('post')) {
            $order = new Order();
            $order->hairdresser_id = intval($request->get('hair_id'));
            $order->user_id = Auth::id();
            $order->date = "".$request->get('date')." ".$request->get('time').":00";
            $order->created_at = Carbon::now();
            $order->save();
//            dd($order);
            return redirect()->route('dashboard');
        }
    }
}
