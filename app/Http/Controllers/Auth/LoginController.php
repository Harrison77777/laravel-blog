<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Model\User;
use Auth;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'frontend/home/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->status == 1) {
                if (Auth::guard()->attempt(['email'=> $request, 'password'=> $request->password], $request->remember)) {
                 return redirect()->intended(route('home.page'));   
                }else {
                    session()->flash('errorMsg', ' E-mail or Password not matched.!!');
                    return redirect()->route('login'); 
                }
            }  
        }else{
            session()->flash('errorMsg', ' E-mail or Password not matched.!!');
            return redirect()->route('login'); 
        }
        
    }
}
