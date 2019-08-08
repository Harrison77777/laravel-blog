<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
class SearchController extends Controller
{
    public function searchResult(Request $request)
    {
        $this->validate($request,[
            'search' => 'required'
        ]);
        $search = $request->input('search');
        $posts = Post::with(['user','admin','favorite_to_users',])
        ->select('title', 'id', 'slug', 'user_id', 'admin_id', 'view_count', 'image')
        ->where('title', 'like', '%'.$search.'%')
        ->where('is_approved', 1)
        ->where('status', 1)
        ->get();
        return view('frontend.search-result.index', compact('posts', 'search'));
    }
}
