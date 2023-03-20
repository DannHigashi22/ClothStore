@extends('layouts.admin')
@section('title','ClothStore - Administracion de Usuarios')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl min-vh-100">
          <div class="row">
            <div class="col-6">
              <h5 class="card-header">Categorias</h5>
            </div>
            <div class="col-6 align-self-center">
              <a class="btn btn-primary float-end me-4" href="{{route('a-category-create')}}"><i class='bx bx-plus-circle'></i>Añadir </a>
            </div>
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
          </div>
            @if (!$categories->isEmpty())
            <div class="col-8 col-sm-5 col-md-4 col-lg-3 col-xl-3 mb-2">
              <input class="form-control" type="text" id="jsearch" placeholder="Ej: Polera">
            </div>
            <div class="table-responsive h-75">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th>Nombre</th>
                      <th>Creado</th>
                      <th>Productos</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0" id="table-ad">
                      @foreach ($categories as $category)
                          <tr>
                              <td><i class="text-danger"></i><strong>{{$category->name}}</strong></td>
                              <td>{{date_format($category->created_at,'d/m/Y')}}</td>
                              <td>{{count($category->products)}}</td>
                              <td>
                                  <a class="btn btn-primary" href="{{route('a-category-edit',['slug'=>$category->slug])}}"><i class='bx bxs-edit-alt'></i></a>
                                  <button type="button" class="btn btn-outline-danger delete" data-id={{$category->id}} data-value="{{$category->name}}">
                                    <i class='bx bxs-trash-alt'></i>
                                  </button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
               <!-- Modal -->
              <div class="modal fade" id="deleteModal" role="dialog" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="deleteModalLabel"></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('a-category-delete')}}" method="post">
                      @csrf
                      @method('DELETE')
                      <div class="modal-body">
                        Esta accion es inreversible,tome precaucion.
                        <input type="hidden" id='id' name="id">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-danger"><i class='bx bxs-trash-alt'></i> Eliminar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            @else
                <div class="alert alert-info">No hay categorias creadas puedes crear : <a class="" href="{{route('a-category-create')}}">Crear Categoria <i class='bx bx-plus'></i></a></div>
            @endif     
        </div>
        <!-- / Content -->
    </div>
  @endsection
@endsection