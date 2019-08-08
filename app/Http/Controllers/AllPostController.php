<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
class AllPostController extends Controller
{
   public function index(){

      
        $posts = Post::with(['user', 'admin', 'favorite_to_users', 'comments'])
        ->select('user_id', 'admin_id', 'id', 'slug', 'title', 'view_count', 'image')
        ->where('status', 1)
        ->where('is_approved', 1)
        ->latest()->paginate(12);
       return view('frontend.all-post.index', compact('posts'));
       
   } 
}
