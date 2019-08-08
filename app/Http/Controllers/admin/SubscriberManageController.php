<?php

namespace App\Http\Controllers\admin;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\subscribe;
class SubscriberManageController extends Controller
{
   public function index(){
       $subscribes = Subscribe::latest()->get();
       return view('backend.subscribe.index', compact('subscribes'));
   }
   public function destroy($subscriberId){
       $deleteSubscribes = Subscribe::find($subscriberId)->delete();
       Toastr::success('Successfully one subscriber deleted', 'success', ['positionClass' => 'toast-top-right']);
       return back();
   }
}
