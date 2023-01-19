@extends('layouts.admin')
@section('title','ClothStore - Administracion de Usuarios')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl">
          @if ($user->id == Auth::user()->id)
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cuenta /</span> Perfil</h4>
          @else
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Usuarios /</span> Editar</h4>
          @endif
          <div class="card mb-4">
            <h5 class="card-header">Detalles del perfil /<span class="text-muted fw-light">Creado el: {{$user->created_at}} </span></h5>
            <!-- Account -->
            <div class="card-body">
              <form  method="POST" action="{{url("/admin/user/edit/update/$user->id")}}">
                @csrf
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="full_name" class="form-label">Nombres</label>
                    <input class="form-control @error('full_name') is-invalid @enderror" type="text" id="full_name" name="full_name" value="{{$user->full_name}}" autofocus="">
                    @error('full_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror 
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="surnames" class="form-label">Apellidos</label>
                    <input class="form-control @error('surnames') is-invalid @enderror" type="text" id="surnames" name="surnames" value="{{$user->surnames}}">
                    @error('surnames')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{$user->email}}" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phone">Telefono</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">CH (+56)</span>
                      <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}">
                      @error('phone')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @if (Auth::user()->role->name == 'Admin')
                  <div class="mb-3 col-md-6">
                    <label for="Role" class="form-label">Role</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" id="role" aria-label="Default select example">
                      <option value="1" {{$user->role->name=='Admin'? 'selected' : ''}} >Admin</option>
                      <option value="2" {{$user->role->name=='User'? 'selected' : ''}} >Usuario/Cliente</option>
                    </select> 
                    @error('role')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  @endif
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Guardar Cambios</button>
                  <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
          @if ($user->role->name =! 'Admin')
            <div class="card">
              <h5 class="card-header">Borrar Cuenta</h5>
              <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                  <div class="alert alert-warning">
                    <h6 class="alert-heading fw-bold mb-1">Esta Seguro que quiere eliminar esta cuenta?</h6>
                    <p class="mb-0">Una vez borrada la cuenta,no hay vuelta atras.</p>
                  </div>
                    <a class="btn btn-danger text-white" href="{{route("a-user-delete",['id'=>$user->id])}}">Borrar cuenta</a>
                </div>
              </div>
            </div>
          @endif
        </div>
    </div>
        <!-- / Content -->
  @endsection
@endsection