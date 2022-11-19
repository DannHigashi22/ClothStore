@extends('layouts.admin')
@section('title','ClothStore - Registro de Usuarios')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="card-header">Creacion de una Categoria</h5>
            <form id="formAuthentication" class="mb-3" action="{{route('a-category-save')}}" method="POST">
                @csrf
              <div class="mb-3">
                <label for="full_name" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nombre de categoria" autofocus/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button class="btn btn-primary d-grid w-100">Registrar</button>
            </form>   
        </div>
    </div>
        <!-- / Content -->
  @endsection
@endsection