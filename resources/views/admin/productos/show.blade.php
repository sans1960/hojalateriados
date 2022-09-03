@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-1">
            
            <div class="card">
                <img src="{{ asset('storage/producto/'.$producto->imagen)}}" class="card-img-top w-25 d-block mx-auto" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $producto->nombre}}</h5>
                  <div class="row">
                    <div class="col">{{ $producto->category->name}}</div>
                    <div class="col">{{ $producto->subcategory->name}}</div>
                    
                  </div>
                  <div class="row">
                    
                    <div class="col">{{ $producto->referencia}}</div>
                    <div class="col">{{ $producto->estado}}</div>
                  </div>
                  <div>{{ $producto->descripcion}}</div>
                  <div>{{ $producto->comentarios}}</div>
                  <div>${{ $producto->precio}} + IVA</div>
                </div>
              </div>
              
              
        
       
        </div>
    </div>
</div>
@endsection