<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->image->store('category', 'public');
        $category = new Category();
        $category->name = $request->name;
        $category->image = $request->image->hashName();
        $category->slug = Str::slug($request->name);
        $category->extract = $request->extract;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('admin.categories.index')->with('message','Category creada') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($request->hasFile('image')){
            unlink(storage_path('app/public/category/'.$category->image));
            $request->image->store('category', 'public');
            $category->image = $request->image->hashName();
        }
        $category->name = $request->name;
        
        $category->slug = Str::slug($request->name);
        $category->extract = $request->extract;
        $category->description = $request->description;
        $category->update();
        return redirect()->route('admin.categories.index')->with('message','Category updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(file_exists(storage_path('app/public/category/'.$category->image))){
            unlink(storage_path('app/public/category/'.$category->image));

        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message','Categoria eliminada');
    }
}
