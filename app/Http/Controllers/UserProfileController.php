<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Auth;
use App\Model\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
class UserProfileController extends Controller
{
    public function index()
    {
        $postCount = Post::where('user_id', Auth::user('web')->id)->where('status', 1)->count();
        return view('frontend.user-dashboard.user_profile.index', compact('postCount'));
    }

    public function setting()
    {
        return view('frontend.user-dashboard.user_profile.edit');
    }

    public function update(Request $request)
    {
      $this->validate($request, [
            'username' => 'required',
            'image'=> 'sometimes|image'
      ]);
      $updateAdminInfo = User::where('id', Auth::user('web')->id)->first();
      $profileImage = $request->file('image');
      if ($request->hasFile('image')) {
          $profileImageName = uniqid().'.'.$profileImage->getClientOriginalExtension();
          $resizeImage = Image::make($profileImage)->resize(400,400)->save($profileImageName);
            if(!Storage::disk('public')->exists('user')){
                Storage::disk('public')->makeDirectory('user');
            }

            Storage::disk('public')->put('user/'.$profileImageName,$resizeImage);

            if($updateAdminInfo->image !== 'default.jpg'){
                if (Storage::disk('public')->exists('user/'.$updateAdminInfo->image)) {
                    Storage::disk('public')->delete('user/'.$updateAdminInfo->image);
                }
            }
            $updateAdminInfo->update([
                'username' => $request->username,
                'description' => $request->description,
                'image' => $profileImageName
            ]);
      }else{
        $updateAdminInfo->update([
            'username' => $request->username,
            'description' => $request->description,
        ]); 
      }
      Toastr::success('Successfully profile information updated', 'success', ['positionClass' => 'toast-top-right']);
      return back();
    }

    public function showResetPasswordForm()
    {
        return view('frontend.user-dashboard.user_profile.reset-form');
    }
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $userHashtedPassword = Auth::user('web')->password;
            
        
        if (Hash::check($request->old_password, $userHashtedPassword) == true) {
            if (!Hash::check($request->password, $userHashtedPassword)) {
                $user = User::find(Auth::user('web')->id);
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                session()->flash("successMsg","Successfully you have changed your password. Please login again by your new password!!");
                return redirect()->route('login');
            }else{
                session()->flash("errorMsg","Old password and new password can't be same. If want to change the current password you have to enter a new password");
                return back();
            }
        }else{
            session()->flash("errorMsg","Your old password doesn't match!");
                return back();
        }
               
    }
}
