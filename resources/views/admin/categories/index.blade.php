@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-around">
    <h4>Categories</h4>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success ">
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
        <div class="col-md-8 mx-auto">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('admin.categories.show',$category) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.categories.edit',$category) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.categories.destroy',$category) }}" method="post">
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
@section('js')
<script src="{{ asset('js/jquery.js') }}"></script>

<script src="{{ asset('js/sweetalert2.js') }}"></script>


<script type="text/javascript">
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
</script>
@endsection
