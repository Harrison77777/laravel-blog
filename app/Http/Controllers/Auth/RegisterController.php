<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Model\User;
use App\Notifications\UserVerifyNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($request)
    {
        // return Validator::make($request, 
        // [
        //     'name' => ['required', 'string', 'max:255'],
        //     'username' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        return $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'username' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register (Request $request)
    {

      
        
       $this->validator($request);
       
       $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => str_random(50),
        ]);
        
        $user->notify(new UserVerifyNotification($user));
        session()->flash('successMsg', 'successfully you have registered please check your mail and verify your mail then you can login.');
        
        return back();
    }
}
