<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin.subcategories.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->image->store('subcategory', 'public');
        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->image = $request->image->hashName();
        $subcategory->slug = Str::slug($request->name);
        $subcategory->extract = $request->extract;
        $subcategory->description = $request->description;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        return redirect()->route('admin.subcategories.index')->with('message','Subategory creada') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        return view('admin.subcategories.show',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit',compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        if($request->hasFile('image')){
            unlink(storage_path('app/public/subcategory/'.$subcategory->image));
            $request->image->store('subcategory', 'public');
            $subcategory->image = $request->image->hashName();
        }
        $subcategory->name = $request->name;
        
        $subcategory->slug = Str::slug($request->name);
        $subcategory->extract = $request->extract;
        $subcategory->description = $request->description;
        $subcategory->category_id = $request->category_id;
        $subcategory->update();
        return redirect()->route('admin.subcategories.index')->with('message','Subcategory updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        if(file_exists(storage_path('app/public/subcategory/'.$subcategory->image))){
            unlink(storage_path('app/public/subcategory/'.$subcategory->image));

        }
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with('message','Subcategoria eliminada');
    }
}
