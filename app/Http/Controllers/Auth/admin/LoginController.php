<?php

namespace App\Http\Controllers\Auth\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Admin_users;
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
     * 
     */

    protected $redirectTo = 'backend/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {   
        
        if(!Auth::guard('admin')->check()){
        return view('backend.auth.signIn');
        }else {
            return redirect()->route('dashboard');
        }
        
    }

    public function login(){
     
       $data = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       
        $admin = Admin_users::where('email', request('email'))->first();
        
            if ($admin) {
                if (Auth::guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], 
                request('remember'))) {
                    return redirect()->intended(route('dashboard'));
                } else {
                    session()->flash('successMsg', 'Email or Password matched');
                    return redirect()->back();
                }
            }else{
                session()->flash('successMsg', 'Email or Password matched');
                return redirect()->back();
            }
        
        
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        //return $this->loggedOut($request) ?: redirect()->route('admin.login');
        return $this->loggedOut($request) ?: redirect()->back();
    }
}
