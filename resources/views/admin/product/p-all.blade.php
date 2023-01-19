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
              <h5 class="card-header">Productos</h5>
            </div>
            <div class="col-6 align-self-center">
              <a class="btn btn-primary float-end me-4" href="{{route('a-product-create')}}"><i class='bx bx-plus-circle'></i>Añadir</a>
            </div>
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @elseif(session('message_error'))
                <div class="alert alert-danger">{{session('message_error')}}</div>
            @endif
            
          </div>
            @if (!$products->isEmpty())
            <div class="table-responsive h-75">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                      @foreach ($products as $product)
                          <tr>
                              <td><a href="{{route('a-product',['id'=>$product->id])}}"><i class="text-danger"></i><strong>{{$product->name}}</strong></a></td>
                              <td>{{$product->price}}$</td>
                              <td>{{$product->stock}} Unidades</td>
                              <td>
                                  <a class="btn btn-primary" href="{{route('a-product-edit',['id'=>$product->id])}}"><i class='bx bxs-edit-alt'></i></a>
                                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class='bx bxs-trash-alt'></i>
                                  </button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
               <!-- Modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="deleteModalLabel">Seguro que desea eliminar "{{$product->name}}"??</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Esta accion es inreversible,tome precaucion.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <a class="btn btn-outline-danger" href="{{route('a-product-delete',['id'=>$product->id])}}"><i class='bx bxs-trash-alt'></i> Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>
            @elseif(!session('message_error'))
                <div class="alert alert-info">No hay productos creados</div>
            @endif     
        </div>
        <!-- / Content -->
    </div>
  @endsection
@endsection