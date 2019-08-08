<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Admin_users;
use App\Model\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
class AdminProfileInfoController extends Controller
{
    public function index()
    {
        $postCount = Post::where('admin_id', Auth::user('admin')->id)->count();
        return view('backend.admin-profile.index', compact('postCount'));
    }
    public function setting()
    {
        return view('backend.admin-profile.edit');
    }
    public function update(Request $request)
    {
      $this->validate($request, [
            'username' => 'required',
            'image'=> 'sometimes|image'
      ]);
      $updateAdminInfo = Admin_users::where('id', Auth::user('admin')->id)->first();
      $profileImage = $request->file('image');
      if ($request->hasFile('image')) {
          $profileImageName = uniqid().'.'.$profileImage->getClientOriginalExtension();
          $resizeImage = Image::make($profileImage)->resize(400,400)->save($profileImageName);
            if(!Storage::disk('public')->exists('admin')){
                Storage::disk('public')->makeDirectory('admin');
            }

            Storage::disk('public')->put('admin/'.$profileImageName,$resizeImage);

            if($updateAdminInfo->image !== 'default.png'){
                if (Storage::disk('public')->exists('admin/'.$updateAdminInfo->image)) {
                    Storage::disk('public')->delete('admin/'.$updateAdminInfo->image);
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
        return view('backend.admin-profile.reset-form');
    }
    public function resetPassword(Request $request)
    {   
        $this->validate($request, 
        [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $adminUserHashtedPassword = Auth::user('admin')->password;
        $checkHashtedPasswordWithOldPassword = Hash::check($request->old_password, $adminUserHashtedPassword);
        if ($checkHashtedPasswordWithOldPassword) {
            if (!Hash::check($request->password, $adminUserHashtedPassword)) {
                $user = Admin_users::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return back();
            }else{
                session()->flash('errorMsg', 'Old password and new password is same. If you want to change your current password please enter a new password');
                return back();
            }
        }else{
            session()->flash("errorMsg", "Old password doesn't match."); 
            return back();
        }
    }

}
