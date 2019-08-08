<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Model\Subscribe;
class SubscribeController extends Controller
{
    public function subscribe(Request $request){
        $this->validate($request, [
            'email'=> 'required|email|unique:subscribes,email'
        ]);
        
        Subscribe::create([
            'email' => $request->email,
        ]);

        Toastr::success('Thank you for subscribing in our site', 'success', ['positionClass' => 'toast-top-right']);
        return back();
    }
}
