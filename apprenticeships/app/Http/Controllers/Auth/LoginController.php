<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

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

    public function showChangePasswordForm(Request $request)
    {

        $directionId = $request->session()->get('direction_logged_in');
    
        if (!$directionId) {
            return back()->with('error', 'Brak zdefiniowanego ID kierunku.');
        }

        return view('auth.change-password', compact('directionId'));

    }

    public function changePassword(Request $request)
    {
    $directionId = session('direction_logged_in');
    $direction = Direction::findOrFail($directionId);

    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|confirmed',
        'new_password_confirmation' => 'required',
    ]);

    if (!Hash::check($request->current_password, $direction->password)) {
        return back()->withErrors(['current_password' => 'Aktualne hasło jest nieprawidłowe.']);
    }

    $direction->password = Hash::make($request->new_password);
    $direction->update();

    return back()->with('success', 'Hasło zostało zmienione.');

    }
}
