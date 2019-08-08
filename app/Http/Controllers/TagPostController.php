<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tag;
class TagPostController extends Controller
{
    public function index($tagSlug)
    {
        $tag = Tag::where('slug', $tagSlug)->firstOrFail();
        $posts = $tag->posts()
        ->with('user', 'admin', 'favorite_to_users', 'comments')
        ->where('status', 1)
        ->where('is_approved', 1)
        ->get();
        return view('frontend.tag-post.index', compact('tag', 'posts')); 
    }
}
