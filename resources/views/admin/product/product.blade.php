@extends('layouts.admin')
@section('title','ClothStore - Administracion de Usuarios')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl">
          <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Productos /</span> {{$product->name}}</h4>
          <div class="card mb-4">
            <h5 class="card-header">Producto detalle</h5>
            <!-- product -->
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <div class="row">
                      @foreach ($product->images as $image)
                      <div class="col-md-{{12/(count($product->images))}}">
                        <img class="d-block w-100" src="{{route('a-product-image',['filename'=>$image->image_path])}}" alt="imagen producto">
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{$product->name}}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Descripcion</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{$product->description}}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="organization" name="organization" value="{{$product->price}}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Stock</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="{{$product->stock}}">
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Codigo de barras</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$product->barcode}}">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">Categoria</label>
                    <input class="form-control" type="text" id="state" name="state" value="{{$product->category->name}}">
                  </div>
                
            </div>
            <!-- /product -->
          </div>
        </div>
    </div>
        <!-- / Content -->
  @endsection
@endsection