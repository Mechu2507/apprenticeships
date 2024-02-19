<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){

        $directions = Direction::all();
        return view('auth.login', compact('directions'));
    }

    public function login(Request $request){

        $request->validate([
            'direction' => 'required|exists:directions,id',
            'password' => 'required',
        ]);

        $directionId = $request->input('direction');
        $password = $request->input('password');

        $direction = Direction::find($directionId);

        if($direction && Hash::check($password, $direction->password)){
            session([
                'direction_logged_in' => $directionId,
                'direction_name' => $direction->name 
            ]);

            if(session('direction_name') == 'Admin'){
                return redirect()->intended('/admin');
            }else{
                return redirect()->intended('/main');
            }

        }

        return back()->withErrors([
            'direction' => 'Nie udało się zalogować z wybranym kierunkiem'
        ]);

    }

    public function logout(){
        session()->forget([
            'direction_logged_in',
            'direction_name'
        ]);
        return redirect()->route('show-login-form');
    }

    public function showDirectionForm(){
        return view('auth.create-direction');
    }

    public function createDirection(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:directions,code',
            'password' => 'required'
        ]);

        $direction = new Direction();
        $direction->name = $request->input('name');
        $direction->password = Hash::make($request->input('password'));
        $direction->save();

        return redirect()->route('show-login-form');
    }
}
