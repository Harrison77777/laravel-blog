<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use Auth;
use App\Model\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
class CommentController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user','comments'])->select(['id'])->where('user_id', Auth::user()->id)->get();
        return view('frontend.user-dashboard.comment.index', compact('posts'));
    }
    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'comment' => 'required',
            'postId' => 'required'
        ]);
            
        if ($validator->passes()) {
            Comment::create([
                'user_id' => Auth::user()->id,
                'post_id'    => $request->postId,
                'comment' => $request->comment
            ]);
            // Toastr::success('Comment added successfully', 'success', ['positionClass' => 'toast-top-right']);
            // return back();
            $allComments = Comment::with('user')->where('post_id',$request->postId)->get();
            $countComments = Comment::where('post_id', $request->postId)->count();
             return response()->json(['success' => 'Comment Added successfully', 'countComment' => $countComments, 'allComments' => $allComments]);   
        }else {
            return response()->json(['error' => $validator->errors()->all()]); 
        }
        
    }
}
