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
              <h4 class="card-header">Usuarios/Clientes</h4>
            </div>
            <div class="col-6 align-self-center">
              <a class="btn btn-primary float-end me-4" href="{{route('a-user-register')}}"><i class='bx bx-plus-circle'></i>Añadir </a>
            </div>
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @elseif(session('message_error'))
                <div class="alert alert-danger">{{session('message_error')}}</div>
            @endif
          </div>
          <div class="col-8 col-sm-5 col-md-4 col-lg-3 col-xl-3 mb-2">
            <input class="form-control" type="text" id="jsearch" placeholder="Ej: Polera">
          </div>
                <div class="table-responsive h-75">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="table-ad">
                        @foreach ($users as $user)
                          @if ($user->id != Auth::user()->id)
                            <tr>
                              <td><strong>{{$user->full_name}}</strong></td>
                              <td>{{$user->surnames}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->phone}}</td>
                              <td>{{$user->role->name}}</td>
                              <td>
                                  <a class="btn btn-primary" href="{{route('a-user-edit',['id'=>$user->id])}}"><i class='bx bxs-edit-alt' ></i></a>
                              </td>
                            </tr>
                          @endif
                        @endforeach
                    </tbody>
                  </table>
                </div>
        </div>
    </div>
        <!-- / Content -->
  @endsection
@endsection