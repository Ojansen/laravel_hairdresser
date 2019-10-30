<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function Profile(Request $request){
        if($request->isMethod('get')) {
            $user = Auth::user();
        }
        elseif ($request->isMethod('post')) {
            $user = Auth::user();

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:64',
                'email' => 'required|unique:users',
            ]);

            if ($validator->fails()) {
                return redirect('/profile')->with('error', $validator->errors()->first());
            } else {
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();

                return redirect('/profile')->with('status', 'Profile updated');
            }
        }
        return view('user/detail', compact('user'));
    }

    public function ChangePassword(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|different:new_password',
            'new_password' => 'required|same:new_password_confirm',
            'new_password_confirm' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return redirect('/profile')->with('error', $validator->errors()->first());
        } else {
            $user->password = Hash::make($request->input('new_password'));
            $user->save();
            return redirect('/profile')->with('status', 'Password updated');
        }
    }

}
