@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-1">
            <div class="card" >
                @foreach ($product as $item)
                <img src="{{ asset('storage/producto/'.$item->imagen)}}" class="card-img-top w-25 d-block mx-auto" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->nombre}}</h5>
                  <p class="card-text text-success">{{$item->referencia}}</p>
                  <p class="card-text fw-bold ">{{$item->subcategory->name}}</p>
                  <p class="card-text ">{{$item->descripcion}}</p>
                  <p class="card-text ">{{$item->detalles}}</p>
                  <p class="card-text text-success fw-bold text-uppercase">{{$item->estado}}</p>
                  <p class="card-text ">${{$item->precio}} + 21% IVA</p>
                </div> 
                @endforeach
              
              
        </div> 
       
        </div>
    </div>
</div>
@endsection