@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-around">
    <h4>Productos</h4>
    <a href="{{ route('admin.productos.create') }}" class="btn btn-success ">
        <i class="bi bi-plus-circle"></i>
    </a>


</div>
<div class="container mt-2" >
    <div class="row">
        @if(session()->has('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     @endif
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Referencia</th>
                        <th>Subcategoria</th>
                        <th>Tipo</th>
                        <th>Opcion</th>
                        <th>Precio</th>
                        
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->referencia }}</td>
                            <td>{{ $product->subcategory->name }}</td>
                            <td>{{ $product->tipo }}</td>
                            <td>
                                {{$product->opcion}}
                                  
                                </td>
                            <td>{{ $product->precio }}</td>
                          
                           
                          
                          
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.productos.show',$product->slug) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.productos.edit',$product) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.productos.destroy',$product) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-sm show_confirm" type="submit"><i class="bi bi-trash"></i></button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div> 
@endsection