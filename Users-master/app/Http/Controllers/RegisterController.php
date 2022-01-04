<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function index(){
        return view('register');
    }

    public function register(Request $request){

       /*dump($request->input('email'));
       dump($request->input('password'));
       dd($request->input('name'));*/
        /*dd($request->all());*/
        $this->validate($request, [
           'name' => 'required|string|min:5|max:50',
           /*'email' => 'required|email:rfc,dns|unique:App\Models\User,email',*/
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|confirmed',
        ]);


        /*User::create($request->all());*/

        $user = User::create([
           'name' => $request -> name,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),

        ]);


        session()->flash('registration', 'Thank you for your registration. Now log in with your credentials!');


        return redirect()->route('login.login');

        /*Auth::login($user);

        return redirect()->route('dashboard');*/




    }
}
