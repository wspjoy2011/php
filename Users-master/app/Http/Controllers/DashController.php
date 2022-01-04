<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    //
    public function index(){
        //$users = User::All();
        $users = User::orderBy('name')->get();
        return view('dashboard', ['users' => $users]);
    }

    public function edit(Request $request){
        /*dd($request->all());*/
        if(!isset($request->action)){
            return redirect()->route('dashboard');
        }
        $logout = false;
        foreach ($request->selector as $userid){
            $user = User::find($userid);
            switch ($request->action){
                case 'block':
                    $user->blocked = true;
                    if($userid == Auth::user()->getAuthIdentifier()) $logout = true;
                    $user->save();
                    break;
                case 'unblock':
                    $user->blocked = false;
                    $user->save();
                    break;
                case 'delete':
                    User::destroy($userid);
                    if($userid == Auth::user()->getAuthIdentifier()) $logout = true;
                    break;
            }

        }
        if($logout) Auth::logout();
        return redirect()->route('dashboard');
    }
}
