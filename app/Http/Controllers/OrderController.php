<?php

namespace App\Http\Controllers;

use App\Hairdresser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Order;
use App\User;
use PHPUnit\Framework\Constraint\IsFalse;

class OrderController extends Controller
{
    public function NewOrder(Request $request)
    {
        if($request->isMethod('get')) {
            $user = Auth::user();
            $orders = Order::all();
            $hairdressers = Hairdresser::all();
            return view('order.select_hairdresser', compact('user', 'orders', 'hairdressers'));
        }
    }

    public function CreateOrder(Request $request, $hairdresser)
    {
        $avail = Order::CheckAvail($hairdresser);
        if($request->isMethod('post')) {
//            $choice = Hairdresser::find($hairdresser);
//            dd($avail->first()->date);

        } elseif($request->isMethod('get')) {
            $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00'];
            $unavail_times = [];
            foreach ($avail as $item) {
                array_push($unavail_times, Carbon::parse($item->date)->format('H:i'));
            }
            for ($i = 0; $i < count($unavail_times); $i++) {
                unset($times[array_search($unavail_times[$i], $times)]);
            }
//            dump($times, $unavail_times);
            return view('order.create_order', compact('times'));
        }
    }
}
