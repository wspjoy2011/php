<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function loginForm(){
        return view('signin');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt([
            'email' => strtolower($request->email),
            'password' => $request-> password,
            /*'blocked' => false,*/
        ], isset($request->remember))
        ){
            $user = Auth::user();
            if($user->blocked){
                return redirect()->back()->with('error', 'This user is blocked. Sorry!');
            }
            $user->last_login_at = Carbon::now("Europe/Kiev");
            $user->save();
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Wrong credentials!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
