<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\User;
use App\Model\Admin_users;
use App\Model\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class SinglePostController extends Controller
{
    public function index($postSlug)
    {

        $post = Post::with(['user', 'admin', 'favorite_to_users', 'categories', 'tags', 'comments'])
        ->where('slug', $postSlug)
        ->firstOrFail();
        
        $randomPosts = Post::with(['user','admin','favorite_to_users', 'comments'])
        ->select('id', 'title', 'image', 'slug', 'admin_id', 'user_id', 'view_count')
        ->where('status', 1)
        ->where('is_approved', 1)
        ->take(3)
        ->inRandomOrder()
        ->get();
       $commentsCount = Comment::where('post_id', $post->id)->count();
        $storeSessionKey = "blog_". $post->id;
        if (!Session::has($storeSessionKey)) {
            $post->increment('view_count');
            Session::put($storeSessionKey,1);
        }
        return view('frontend.single-post.index', compact('post', 'randomPosts', 'commentsCount'));
        
    }
    public function commentShow($post_id)
    {
        $showComment = Comment::with('user')->where('post_id', $post_id)->get();
        return response()->json(['showComment'=> $showComment]);
    }
}
