@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card" >
                <img src="{{ asset('storage/category/'.$category->image)}}" class="card-img-top w-50 d-block mx-auto" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$category->name}}</h5>
                 <div>
                    {!! $category->extract !!}
                 </div>
                 <div>
                    {!! $category->description !!}
                 </div>
                </div>
              </div>
        </div>
    </div>
</div>
    
@endsection