@extends('layouts.admin')
@section('title','ClothStore - Registro de Usuarios')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="card-header">Registro de Usuarios</h5>
            @include('includes.user-register',['url'=>'a-user-save'])    
        </div>
    </div>
        <!-- / Content -->
  @endsection
@endsection