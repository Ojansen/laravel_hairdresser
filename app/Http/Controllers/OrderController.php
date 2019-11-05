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

    public function CreateOrder(Request $request, $hairdresser=null, $date=null)
    {
        $times = $this->CheckTime($hairdresser, $date);
        if($request->isMethod('post')) {
            return response()->json([$times]);
        } elseif($request->isMethod('get')) {
//            dd($times);
            return view('order.create_order', compact('times', 'hairdresser'));
        }
    }
    private function CheckTime($hairdresser, $date)
    {
        $avail = Order::where('hairdresser_id', '=', $hairdresser)->where('date', '=', $date)->get();
        $times = collect(['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00']);
        $unavail_times = [];

        foreach ($avail as $item) {
            array_push($unavail_times, Carbon::parse($item->time)->format('H:i'));
        }
        for ($i = 0; $i < count($unavail_times); $i++) {
            unset($times[array_search($unavail_times[$i], $times->toArray())]);
        }

        return $times;
    }
}
