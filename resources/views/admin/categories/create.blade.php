@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header text-center bg-primary fw-bold text-white">
                Añadir Categoria
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" required autofocus name="name">
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-4 mx-auto">
                            <img  id="preview-image-before-upload" class="img-fluid d-block mx-auto" src="https://cdn.pixabay.com/photo/2022/02/22/17/25/stork-7029266_960_720.jpg" alt="">
                        </div>
                    </div>
                      <div class="mb-3">
                        <label for="image" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="image" name="image">
                      </div>
                      <div class="mb-3">
                        <label for="extract" class="form-label">Estracto</label>
                        <textarea class="form-control" id="extract" rows="3" name="extract"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                      </div>

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
@section('js')
<script type="text/javascript">

    $(document).ready(function (e) {
       $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
          $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
       });
    });
    </script> 
     
     <script>
          CKEDITOR.replace( 'extract' );
          CKEDITOR.replace( 'description' );
        </script> 
@endsection