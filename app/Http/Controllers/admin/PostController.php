<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Category;
use App\Model\Tag;
//use App\Model\User;
use App\Model\Admin_users;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = cache('posts', function(){
            return Post::with('admin', 'user')->latest()->get();
        });
        
        return view('backend.post.index',$data);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('backend.post.create', compact('categories','tags'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|unique:posts,title',
                'description' => 'required',
                'image' => 'required|image',
                'category_id' => 'required',
                'tag_id' => 'required',
            ]
        );
        $postImage = $request->file('image');
        if ($request->hasFile('image')) {
            $imageName = uniqid().'.'.$postImage->getClientOriginalExtension();
            $resizeImage = Image::make($postImage)->resize(1600, 1050)->save($imageName);
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }
            Storage::disk('public')->put('post/'.$imageName,$resizeImage);
           $createPost = new Post();
           $createPost->title = $request->title;
           $createPost->slug = str_slug($request->title);
           $createPost->image = $imageName;

           if ($request->publish) {
                $createPost->status = $request->publish;
           }

           $createPost->description = $request->description;
           $createPost->is_approved = 1;
           $createPost->admin_id = Auth::user('admin')->id;
           $createPost->save();

           $createPost->categories()->attach($request->category_id);
           $createPost->tags()->attach($request->tag_id); 
        }
        Toastr::success('Successfully post created', 'success', ['positionClass' => 'toast-top-right']);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        $data['post'] = Post::where('id', $id)->firstOrFail();
       
        
        return view('backend.post.show', $data) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('backend.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'sometimes|image',
                'category_id' => 'required',
                'tag_id' => 'required',
            ]
        );
        $updatePost = Post::find($id);
        $postImage = $request->file('image');

        if ($request->hasFile('image')) {
            $imageName = uniqid().'.'.$postImage->getClientOriginalExtension();
            $resizeImage = Image::make($postImage)->resize(1600, 1050)->save($imageName);
            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }
            Storage::disk('public')->put('post/'.$imageName,$resizeImage);

            if (Storage::disk('public')->exists('post/'.$updatePost->image)) {
                Storage::disk('public')->delete('post/'.$updatePost->image);
            }
           
           $updatePost->title = $request->title;
           $updatePost->slug = str_slug($request->title);
           $updatePost->image = $imageName;

           if ($request->publish) {
                $updatePost->status = $request->publish;
           }else {
                $updatePost->status = 0;
           }

           $updatePost->description = $request->description;
           $updatePost->is_approved = 1;
           $updatePost->admin_id = Auth::user()->id;
           $updatePost->save();

           $updatePost->categories()->sync($request->category_id);
           $updatePost->tags()->sync($request->tag_id); 
        }else{
            $updatePost->title = $request->title;
            $updatePost->slug = str_slug($request->title);
            if ($request->publish) {
                 $updatePost->status = $request->publish;
            }else {
                 $updatePost->status = 0;
            }
            $updatePost->description = $request->description;
            $updatePost->is_approved = 1;
            $updatePost->admin_id = Auth::user()->id;
            $updatePost->save();

           $updatePost->categories()->sync($request->category_id);
           $updatePost->tags()->sync($request->tag_id); 
        }
        Toastr::success('Successfully post updated!!', 'success', ['positionClass' => 'toast-top-right']);
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletePost= Post::find($id);
        if (Storage::disk('public')->exists('post/'.$deletePost->image)) {
            Storage::disk('public')->delete('post/'.$deletePost->image);
        }
        $deletePost->delete();
        Toastr::success('Successfully post deleted!!', 'success', ['positionClass' => 'toast-top-right']);
        return redirect()->route('post.index');
    }
}
