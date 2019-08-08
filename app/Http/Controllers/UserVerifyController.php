<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
class UserVerifyController extends Controller
{
    public function verify($VerifyToken)
    {
        $user = User::where('remember_token', $VerifyToken)->first();
        if (!is_null($user)) {
            $user->status = 1;
            $user->remember_token = null;
            $user->save();
        }
        session()->flash('successMsg', 'successfully you have verified your e-mail address now you can login.');
       return redirect()->route('login');
    }
}
