@extends('layouts.admin')
@section('title','ClothStore - Administracion de Usuarios')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl min-vh-100">
            <h5 class="card-header">Usuarios/Clientes</h5>
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            @if (!$categories->isEmpty())
            <div class="table-responsive h-75">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th>Nombres</th>
                      <th>Thumbnail</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                      @foreach ($categories as $category)
                          <tr>
                              <td><i class="text-danger"></i><strong>{{$user->full_name}}</strong></td>
                              <td></td>
                              <td>
                                  <a class="dropdown-item" href="{{route('a-user-edit',['id'=>$category->id])}}"><i class='bx bxs-edit-alt' ></i></a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            @else
                <div class="alert alert-info">No hay categorias creadas puedes crear aca: <a class="" href="{{route('a-category-create')}}">Crear Categoria <i class='bx bx-plus'></i></a></div>
            @endif     
        </div>
        <!-- / Content -->
    </div>
  @endsection
@endsection