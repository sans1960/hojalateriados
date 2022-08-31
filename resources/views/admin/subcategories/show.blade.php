@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card" >
                <img src="{{ asset('storage/subcategory/'.$subcategory->image)}}" class="card-img-top w-50 d-block mx-auto" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$subcategory->name}}</h5>
                  <h5 class="card-title">{{$subcategory->category->name}}</h5>
                 <div>
                    {!! $subcategory->extract !!}
                 </div>
                 <div>
                    {!! $subcategory->description !!}
                 </div>
                </div>
              </div>
        </div>
    </div>
</div>
    
@endsection