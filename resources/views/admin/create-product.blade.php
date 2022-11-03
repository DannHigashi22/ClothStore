@extends('layouts.admin')
@section('title','Crear producto')
@section('container')
@parent
  @section('content')
      <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->
      <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="card-header">Registro de Usuarios</h5>
        <form id="formAuthentication" class="mb-3" action="" method="POST">
            @csrf
          <div class="mb-3">
            <label for="full_name" class="form-label">Nombres </label>
            <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" placeholder="Ingrese nombres" autofocus/>
            @error('full_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="surnames" class="form-label">Apellidos</label>
            <input type="text" class="form-control @error('surnames') is-invalid @enderror" id="surnames" name="surnames" placeholder="Ingrese sus apellidos" autofocus/>
            @error('surnames')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingresa tu email" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="phone">Telefono</label>
            <input type="text" id="phone" name="phone" class="form-control phone-mask @error('phone') is-invalid @enderror" placeholder="912345678"/>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="password">Contraseña</label>
            <div class="">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" aria-describedby="password"/>
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
        
          <button class="btn btn-primary d-grid w-100">Registrar</button>
        </form>

      </div>
      <!-- / Content -->
  @endsection
@endsection