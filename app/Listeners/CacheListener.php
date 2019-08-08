<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Post;

class CacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        cache()->forget('posts');
        $posts = Post::with('admin', 'user', 'favorite_to_users', 'comments')->latest()->get();
        cache()->forever('posts', $posts);
        
    }
}
