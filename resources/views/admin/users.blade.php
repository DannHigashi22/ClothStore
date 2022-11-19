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
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td><i class="text-danger"></i><strong>{{$user->full_name}}</strong></td>
                                <td>{{$user->surnames}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>
                                    <a class="dropdown-item" href="{{route('a-user-edit',['id'=>$user->id])}}"><i class='bx bxs-edit-alt' ></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
        </div>
    </div>
        <!-- / Content -->
  @endsection
@endsection