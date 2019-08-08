<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Admin_users;
use App\Model\Post;
use App\Model\Comment;
use App\Model\Category;
use App\Model\Tag;
class DashboardController extends Controller
{
    public function index()
    {
        $countPendingPost = Post::where('is_approved', 0)->count();
        $totalUsers = User::where('status', 1)->count();
        $countTodayUser = User::where('status', 1)->where('created_at', Carbon::today())->count();
        $countPost = Post::where('status', 1)->where('is_approved', 1)->count();
        $totalComments = Comment::count();
        $countCategories = Category::count();
        $countTags = Tag::count();
        $ActiveUsersList = User::where('status', 1)
                    ->withCount('comments')
                    ->withCount('posts')
                    ->withCount('favorite_posts')
                    ->orderBy('comments_count', 'desc')
                    ->orderBy('posts_count', 'desc')
                    ->orderBy('favorite_posts_count', 'desc')
                    ->take(10)
                    ->get();

        $topPosts = Post::with(['user', 'admin', 'comments', 'favorite_to_users'])->where('is_approved', 1)
                    ->withCount('comments')
                    ->withCount('favorite_to_users')
                    ->orderBy('comments_count', 'desc')
                    ->orderBy('favorite_to_users_count', 'desc')
                    ->orderBy('view_count', 'desc')
                    ->take(5)
                    ->get();

        return view('backend/dashboard/dashboard', compact('countTodayUser', 'countPost', 'ActiveUsersList', 'countPendingPost', 'totalUsers', 'totalComments', 'topPosts', 'countCategories', 'countTags'));
    }
}
