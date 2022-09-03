<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Producto;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('admin.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.productos.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->imagen->store('producto', 'public');
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->imagen = $request->imagen->hashName();
        $producto->slug = Str::slug($request->nombre);
        $producto->referencia = $request->referencia;
        $producto->descripcion = $request->descripcion;
        $producto->detalles = $request->detalles;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->category_id = $request->category_id;
        $producto->subcategory_id = $request->subcategory_id;
        $producto->save();
        return redirect()->route('admin.productos.index')->with('message','Producto creado') ;
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('admin.productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categories = Category::all();
        return view('admin.productos.edit',compact('categories','producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        if($request->hasFile('imagen')){
            unlink(storage_path('app/public/producto/'.$producto->imagen));
            $request->imagen->store('producto', 'public');
            $producto->imagen = $request->imagen->hashName();
        }
        $producto->nombre = $request->nombre;     
        $producto->slug = Str::slug($request->nombre);
        $producto->referencia = $request->referencia;
        $producto->descripcion = $request->descripcion;
        $producto->detalles = $request->detalles;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->category_id = $request->category_id;
        $producto->subcategory_id = $request->subcategory_id;
        $producto->update();
        return redirect()->route('admin.productos.index')->with('message','Producto actualizado') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        if(file_exists(storage_path('app/public/producto/'.$producto->imagen))){
            unlink(storage_path('app/public/producto/'.$producto->imagen));

        }
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('message','Producto eliminado');
    }
    public function getSubcategories(Request $request){
        $subcategories = SubCategory::where('category_id',$request->category_id)->orderBy('name')->get();
        if (count($subcategories) > 0) {
            return response()->json($subcategories);
        }
    }
}
