<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\Events\CreateEvent;
use App\Events\UpdatedEvent;
use App\Events\DeleteEvent;
use App\Listeners\CacheListener;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'admin_id',
        'title',
        'slug',
        'image',
        'description',
        'view_count',
        'status',
        'is_approved'
    ];

    protected $dispatchesEvents = [
        'created' => CreateEvent::class,
        'updated' => UpdatedEvent::class,
        'deleted' => DeleteEvent::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function admin()
    {
        return $this->belongsTo(Admin_users::class);
    }

    public function favorite_to_users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
