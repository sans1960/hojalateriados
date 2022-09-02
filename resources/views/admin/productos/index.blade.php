@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-around">
    <h4>Productos</h4>
    <a href="{{ route('admin.productos.create')}}" class="btn btn-success ">
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
          
              
        </div>
    </div>
</div> 
@endsection