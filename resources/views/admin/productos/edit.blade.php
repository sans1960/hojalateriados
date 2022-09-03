@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header text-center bg-primary fw-bold text-white">
                    Editar Producto
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.productos.update',$producto)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" required value="{{ $producto->nombre}}" name="nombre">
                          </div>
                          <div class="row mb-3">
                            <div class="col">
                                <label for="referencia" class="form-label">Referencia</label>
                            <input type="text" class="form-control" id="referencia"  value="{{ $producto->referencia}}" required  name="referencia">
                            </div>
                            <div class="col">
                                <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control"  value="{{ $producto->precio}}" id="precio" required name="precio">
                            </div>
                            
                          </div>
                      
                          <div class="row mb-3">
                            <div class="col">
                              <select class="form-select" id="category" required name="category_id" aria-label=".form-select-lg example">
                                  <option selected>Escoje Categoria</option>
                                  @foreach ($categories as $category)
                                      <option value="{{ $category->id}}">{{ $category->name}}</option>
                                  @endforeach
                             
                                 
                                </select>
                          </div>
                            <div class="col">
                                <select class="form-select" id="subcategory" required name="subcategory_id" aria-label=".form-select-lg example">
                                    
                               
                                   
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
                                <img  id="preview-image-before-upload" class="img-fluid d-block mx-auto" src="https://cdn.pixabay.com/photo/2022/02/22/17/25/stork-7029266_960_720.jpg" alt="">
                            </div>
                        </div>
                          <div class="mb-3">
                            <label for="image" class="form-label">Imagen</label>
                            <input class="form-control" type="file" id="image" name="imagen">
                          </div>
                       
                          <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" rows="3" required name="descripcion">
                                {{ $producto->descripcion}}"
                            </textarea>
                          </div>
                          <div class="mb-3">
                            <label for="comentarios" class="form-label">Detalles</label>
                            <textarea class="form-control" id="comentarios" rows="3" required name="detalles">
                                {{ $producto->detalles}}"
                            </textarea>
                          </div>
                            
                        <div class="row mb-3">
                            <div class="col-md-4 mx-auto">
                            <button type="submit" class="btn btn-primary d-block mx-auto">  <i class="bi bi-upload"></i></button>
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
<script>
  $(document).ready(function () {
      $('#category').on('change',function(){
        var catId = this.value;
        $('#subcategory').html('');
        $.ajax({
          url:'{{ route('getsubcategories') }}?category_id='+catId,
          type:'get',
          success:function(res){
            $('#subcategory').html('<option value="">Escoje Subcategoria</option>');
            $.each(res,function(key,value){
                        $('#subcategory').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                    });
          }
        });
      });
  });
</script>
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
@endsection