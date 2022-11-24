@extends('layouts.admin')
@section('title','ClothStore - Administracion de Usuarios')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categorias /</span> Editar</h4>
          <div class="card mb-4">
            <h5 class="card-header">Detalles del perfil</h5>
            <!-- Account -->
            <div class="card-body">
              <form  method="POST" action="{{route('a-category-update')}}">
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="name" class="form-label">Nombre</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{$category->name}}" autofocus="">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror 
                  </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>
                  <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
    </div>
        <!-- / Content -->
  @endsection
@endsection