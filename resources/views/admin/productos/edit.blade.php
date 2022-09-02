@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header text-center bg-primary fw-bold text-white">
                    Añadir Producto
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" >
                        @csrf
                         @foreach ($producto as $product)
                         <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="{{$product->nombre}}" required autofocus name="nombre">
                          </div>
                          <div class="row mb-3">
                            <div class="col">
                                <label for="referencia" class="form-label">Referencia</label>
                            <input type="text"  value="{{$product->referencia}}" class="form-control" id="referencia" required  name="referencia">
                            </div>
                            <div class="col">
                                <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" value="{{ $product->precio}}" required name="precio">
                            </div>
                            
                          </div>
                      
                          <div class="row mb-3">
                            <div class="col">
                                <select class="form-select " required name="subcategory_id" aria-label=".form-select-lg example">
                                    <option selected>Escoje Subcategoria</option>
                                    @foreach ($subcategories as $subcategory)
                                       <option value="{{ $subcategory->id}}">{{ $subcategory->name}}</option>
                                   @endforeach
                                   
                                  </select>
                            </div>
                            <div class="col">
                                <select class="form-select " required name="estado" aria-label=".form-select-lg example">
                                    <option selected>Escoje Estado</option>
                                    <option value="disponible">DISPONIBLE</option>
                                    <option value="agotado">AGOTADO</option>
                                   
                                   
                                  </select>
                            </div>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <div class="col-md-4 mx-auto">
                                <img  id="preview-image-before-upload" class="img-fluid d-block mx-auto" src="{{ asset('storage/producto/'.$product->imagen)}}" alt="">
                            </div>
                        </div>
                          <div class="mb-3">
                            <label for="image" class="form-label">Imagen</label>
                            <input class="form-control" type="file" id="image" name="imagen">
                          </div>
                       
                          <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" rows="3" required name="descripcion">
                                {{$product->descripcion}}
                            </textarea>
                          </div>
                          <div class="mb-3">
                            <label for="comentarios" class="form-label">Detalles</label>
                            <textarea class="form-control" id="comentarios" rows="3" required name="detalles">
                                {{$product->detalles}}
                            </textarea>
                          </div>
                             
                        @endforeach 
                  
                        <div class="row mb-3">
                            <div class="col-md-4 mx-auto">
                            <button type="submit" class="btn btn-primary d-block mx-auto"> <i class="bi bi-plus-circle"></i></button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
    
        </div>
    </div>
    
    
    </div>  
@endsection