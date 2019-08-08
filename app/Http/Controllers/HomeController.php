<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Category;
use App\Model\Admin_users;
use App\Model\User;
class HomeController extends Controller
{
     public function index()
     {   
          
      $data['categories'] = Category::latest()->get();

      $data['posts'] = Post::with('user', 'admin', 'favorite_to_users', 'comments')
               ->select(['id', 'slug', 'user_id', 'admin_id', 'title', 'view_count', 'image'])
               ->where('is_approved', 1)
               ->where('status', 1)
               ->latest()->take(12)->get();

     

          
        return view('frontend.home.index', $data);
     }
}
