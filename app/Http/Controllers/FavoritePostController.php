<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Post;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
class FavoritePostController extends Controller
{
    public function add($postId)
    {
        $user = Auth::user();
 
        $countFavoriteList = $user->favorite_posts()
        ->where('post_id', $postId)->count();
        
        if ($countFavoriteList === 0) {
            $user->favorite_posts()->attach($postId);
            Toastr::success('Successfully you have added this post to favorite list', 'success', ['positionClass' => 'toast-top-right']);
            return back();
        }elseif($countFavoriteList === 1){
            $user->favorite_posts()->detach($postId);
            Toastr::info('This post has been removed from you favorite list', 'info', ['positionClass' => 'toast-top-right']);
            return back();
        }
       
    }
    public function showFavoritePostList()
    {
        
       $favoritePosts = Auth::user('web')->favorite_posts;
        
        return view('frontend.user-dashboard.favorite-post-list.index', compact('favoritePosts'));
    }
    public function remove($postId)
    {
        $user = Auth::user();
        $user->favorite_posts()->detach($postId);
        Toastr::info('This post has been removed from you favorite list', 'info', ['positionClass' => 'toast-top-right']);
        return back();
    }
    public function show($postId)
    {

      $post = Post::with(['user', 'admin', 'tags', 'categories'])->where('id', $postId)->firstOrFail();
      
        return view('frontend.user-dashboard.favorite-post-list.show', compact('post'));
      
    }
}
