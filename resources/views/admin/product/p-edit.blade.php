@extends('layouts.admin')
@section('title','ClothStore - Administracion de Usuarios')
@section('container')
@parent
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->
<div class="container-xxl">
  <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Productos /</span> Editar </h4>
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
                <img id="img-detail" class="img-thumbnail" src="{{route('a-product-image',['filename'=>$image->image_path])}}" alt="imagen producto">
              </div>
              @endforeach
            </div>
          </div>
          <form action="{{route('a-product-update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="mb-2 col-md-6">
                <input type="hidden" name="id" value="{{$product->id}}">
                <label for="name" class="form-label">Nombre</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{$product->name}}">
                @error('images')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <label for="description" class="form-label">Descripcion</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="20" rows="10">{{$product->description}}</textarea>
                @error('description')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-2 col-md-6">
                <label for="price" class="form-label">Precio</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$product->price}}">
                @error('price')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <label class="form-label" for="stock">Stock</label>
                <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{$product->stock}}">
                @error('stock')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <label for="barcode" class="form-label">Codigo de barras</label>
                <input type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode" value="{{$product->barcode}}">
                @error('barcode')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <label for="category" class="form-label">Categoria</label>
                <select name="category" class="form-select @error('category') is-invalid @enderror">
                  <option>Seleccione categoria</option>
                  @foreach ($categories as $cate)
                    <option value="{{$cate->id}}"{{$product->category->id==$cate->id?'selected':''}} >{{$cate->name}}</option>
                  @endforeach
                </select>
                @error('category')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <label for="images" class="form-label">Imagenes</label>
                    <input class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" type="file" name="images[]" multiple="multiple">
                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('images.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
              </div>
              <div class="col-12 mt-2 d-flex justify-content-end">
                <input class="btn btn-primary " type="submit" value="Actualizar">
              </div>
            </div>
          </form>
        </div>
    <!-- /product -->
  </div>
</div>
</div>
<!-- / Content -->
@endsection
@endsection