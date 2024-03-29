<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tag;
use Brian2694\Toastr\Facades\Toastr;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('backend.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        Tag::create([
            'name' => $request->name,
            'slug' =>\str_slug($request->name)
        ]);
        Toastr::success('Successfully tag created', 'success', ['positionClass'=> 'toast-top-right']);
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tagDetails = Tag::select(['name', 'slug', 'created_at'])->where('id', $id)->firstOrFail();
        return view('backend.tags.show', compact('tagDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        return view('backend.tags.edit', compact('tag'));
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
        $this->validate($request, [
            
            'name' => 'required',
            'slug' => 'required'

        ]);
        $tag = Tag::find($id);
        $tag->update([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);
        Toastr::success('Tag updated successfully', 'success', ['positionClass' => 'toast-bottom-right']);
        return redirect()->route('tag.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();

        Toastr::success('Tag deleted successfully', 'success', ['positionClass' => 'toast-top-right']);
        return back();
        
    }
}
