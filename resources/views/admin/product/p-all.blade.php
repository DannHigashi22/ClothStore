@extends('layouts.admin')
@section('title','ClothStore - Administracion de Productos')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl min-vh-100">
          <div class="row">
            <div class="col-6">
              <h4 class="card-header">Productos</h4>
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
            <div class="col-8 col-sm-5 col-md-4 col-lg-3 col-xl-3 mb-2">
              <input class="form-control" type="text" id="jsearch" placeholder="Ej: Polera">
            </div>
            <div class="table-responsive-sm h-75 ">
                <table class="table fs-6">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Nombre</th>
                      <th>Sku</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Stock</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0" id="table-ad">
                      @foreach ($products as $product)
                          <tr>
                              <td class="text-nowrap" scope="row"><a class="fw-bold fs-5" href="{{route('a-product',['slug'=>$product->slug])}}">{{$product->name}}</a></td>
                              <td>{{$product->barcode}}</td>
                              <td>{{$product->price}}</td>
                              <td>{{$product->stock}}</td>
                              <td class="text-nowrap" >
                                  <a class="btn btn-primary" href="{{route('a-product-edit',['slug'=>$product->slug])}}"><i class='bx bxs-edit-alt'></i></a>
                                  <button type="button" class="btn btn-outline-danger delete" data-id={{$product->id}} data-value="{{$product->name}}">
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
                      <h1 class="modal-title fs-5" id="deleteModalLabel"></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('a-product-delete')}}" method="post">
                      @csrf
                      @method('DELETE')
                      <div class="modal-body">
                        Esta accion es inreversible,tome precaucion.
                        <input type="hidden" id='id' name="id">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" ><i class='bx bxs-trash-alt'></i> Eliminar</button>
                      </div>
                    </form>
                    
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