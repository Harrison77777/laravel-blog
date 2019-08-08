<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;

class CategoryPostController extends Controller
{
    public function index($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
         $posts = $category->posts()
        ->with(['admin', 'user', 'favorite_to_users', 'comments'])
        //->select(['id','title', 'slug', 'image', 'view_count', 'user_id', 'admin_id'])
        ->where('status', 1)->where('is_approved', 1)
        ->get();
      
        return view('frontend.category-post.index', compact('category','posts'));
    }
}
