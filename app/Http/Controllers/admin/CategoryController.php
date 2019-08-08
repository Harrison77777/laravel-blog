<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'image' => 'required|image'
        ]);

        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $uniqueImgName = uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('category')) {
                Storage::disk('public')->makeDirectory('category');
            }
            $categoryImage = Image::make($image)->resize(1600, 469)->save($uniqueImgName);
            Storage::disk('public')->put('category/'.$uniqueImgName,$categoryImage);

            if (!Storage::disk('public')->exists('category/slider')) {
                Storage::disk('public')->makeDirectory('category/slider');
            }
            $categoriesSlidePhoto = Image::make($image)->resize(500,333)->save($uniqueImgName);
            Storage::disk('public')->put('category/slider/'.$uniqueImgName,$categoriesSlidePhoto);
            Category::create(

                [
                    'name' => $request->name,
                    'slug' => str_slug($request->name),
                    'image' => $uniqueImgName
                ]
                
            );
        }
        Toastr::success('Successfully category created!!', 'success', ['positionClass'=> 'toast-top-right']);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryDetails = Category::where('id', $id)->firstOrFail();
        return view('backend.category.show', compact('categoryDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categoryEdit = Category::where('id', $id)->firstOrFail();  
      return view('backend.category.edit', compact('categoryEdit'));
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
        $this->validate($request,
            [
                'name' => 'required',
                'image' => 'sometimes|image',
            ]
        );
        $updateCategory = Category::find($id);
        $updateImage = $request->file('image');
        if ($request->hasFile('image')) {
            $imageName = uniqid().'.'.$updateImage->getClientOriginalExtension();

            $imageForCategory = Image::make($updateImage)->resize(1600, 469)->save($imageName);
            if (!Storage::disk('public')->exists('category')) {
               Storage::disk('public')->makeDirectory('category'); 
            }

            Storage::disk('public')->put('category/'.$imageName,$imageForCategory);
            
            if (Storage::disk('public')->exists('category/'.$updateCategory->image)) {
                Storage::disk('public')->delete('category/'.$updateCategory->image);
            }

            $imageForCategorySlide = Image::make('$updateImage')->resize(500, 333)->save($imageName);
            if (!Storage::disk('public')->exists('category/slider')) {
                Storage::disk('public')->makeDirectory('category/slider');
            }
            Storage::disk('public')->put('category/slider'.$imageName,$imageForCategorySlide);
            if (Storage::disk('public')->exists('category/slider/'.$updateCategory->image)) {
                Storage::disk('public')->delete('category/slider/'.$updateCategory->image);
            }
            $updateCategory->update(
                
                [
                    'name' => $request->name,
                    'slug' => $request->name,
                    'image' => $imageName
                ]
               
            );

        }else {
            $updateCategory->update(

                [
                    'name' => $request->name,
                    'slug' => $request->name,
                ]
               
            );
        }
        Toastr::success('Category updated successfully!!', 'success', ['positionClass' => 'toast-top-right']);
        return \redirect()->route('category.show', $updateCategory->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCategory = Category::find($id);
        if (Storage::disk('public')->exists('category/'.$deleteCategory->image)) {
            Storage::disk('public')->delete('category/'. $deleteCategory->image);
        }
        if (Storage::disk('public')->exists('category/slider/'.$deleteCategory->image)){
            Storage::disk('public')->delete('category/slider/'.$deleteCategory->image);
        }
        $deleteCategory->delete();
        Toastr::success('Category deleted successfully!!', 'success', ['positionClass' => 'toast-top-right']);
        return back();
    }
   
}
