<?php

namespace App\Http\Controllers\admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use Illuminate\Support\Facades\Storage;
class ApprovalController extends Controller
{
    public function index()
    {
        $notApprovalPosts = Post::where('is_approved', false)->latest()->get();
        return view('backend.approve.index', compact('notApprovalPosts'));
    }

    public function approvalAction($notApprovalId)
    {
        $approvePost = Post::where('id', $notApprovalId)->first();
        $approvePost->update([
            'is_approved' => true
        ]);
        Toastr::success('Successfully the post has been approved!!', 'success', ['positionClass' => 'toast-top-right']);
        return redirect()->route('approval.index');
    }
    public function postCheck($notApprovalId){
        
        $notApprovalPost = Post::where('id', $notApprovalId)->firstOrFail();
        return view('backend.approve.check', compact('notApprovalPost'));
    }

    public function delete($notApprovalId)
    {
        $deletePost = Post::find($notApprovalId);
        if (!is_null($deletePost)) {
            if (Storage::disk('public')->exists('post/'.$deletePost->image)) {
                Storage::disk('public')->delete('post/'.$deletePost->image);
            }
            $deletePost->delete();
        }
        Toastr::success('Successfully this not approved post has been deleted!!', 'success', ['positionClass' => 'toast-top-right']);
        return back();
    }
}
