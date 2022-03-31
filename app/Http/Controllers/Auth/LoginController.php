<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        $input = $request->all();
        $this->validate($request, [
            'nik' => 'required',
            'password' => 'required',
        ]);
        $fieldType = filter_var($request->nik, FILTER_VALIDATE_EMAIL) ? 'email' : 'nik';
        if(auth()->attempt(array(
            $fieldType => $input['nik'],
            'password' => $input['password']
        ))){
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('gagal', 'NIK dan Password salah');
        }
    }

}
