@extends('layouts.admin')
@section('title','ClothStore - A-Productos')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
  <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl">
          <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Productos /</span> Detalle </h4>
          <div class="card mb-4">
            <h5 class="card-header">Producto detalle : {{$product->name}}</h5>
            <!-- product -->
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <div class="row">
                      <label class="form-label" for="images">Imagenes:</label>
                      @foreach ($product->images as $image)
                      <div class="col-md-{{12/(count($product->images))}} mb-3 d-flex justify-content-center ">
                        <img id="img-detail" class="img-thumbnail " src="{{route('a-product-image',['filename'=>$image->image_path])}}" alt="imagen producto">
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="mb-1 col-md-6"> 
                    <p><span>Nombre:</span>{{$product->name}}</p>
                    <p><span>Descripcion:</span>{!! $product->description !!}</p>
                  </div>
                  <div class="mb-1 col-md-6">
                    <p><span class="form-label">Precio:</span> {{$product->price}}</p>
                    <p><span class="form-label">Stock:</span> {{$product->stock}}</p>
                    <p><span class="form-label">Codigo de barras:</span> {{$product->barcode}}</p>
                    <p><span class="form-label">Categoria:</span> {{$product->category->name}}</p>
                  </div>
              </div>
            <!-- /product -->
            </div>
        </div>
  </div>
        <!-- / Content -->
  @endsection
@endsection