<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use Auth;
class UserDashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index()
    {
        
       $user = Auth::user('web');
       $popularPosts = $user->posts()
       ->withCount('comments')
       ->withCount('favorite_to_users')
       ->orderBy('view_count', 'desc')
       ->orderBy('comments_count', 'desc')
       ->orderBy('favorite_to_users_count', 'desc')
       ->take(10)
       ->get();
       
        $postCount = Post::where('user_id', Auth::user('web')->id)->where('is_approved', 1)->count();
        $pendingPost = Post::where('user_id', Auth::user('web')->id)->where('is_approved', 0)->count();
        return view('frontend.user-dashboard.home', compact('postCount', 'pendingPost', 'popularPosts'));
    }
}
