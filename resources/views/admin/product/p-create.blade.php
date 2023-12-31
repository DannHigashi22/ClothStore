@extends('layouts.admin')
@section('title','Crear producto')
@section('container')
@parent
  @section('content')
      <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->
      
      <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="card-header">Creacion de productos</h5>
        <form id="formAuthentication" class="mb-3" action="{{route('a-product-save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="mb-2 col-md-6">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ingrese Nombre" value="{{old('name')}}" autofocus/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="description" class="form-label">Descripcion</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="20" rows="10">{{old('name')}}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="mb-2 col-md-6">
                <label for="barcode" class="form-label">Codigo de Barra</label>
                <input type="text" class="form-control @error('barcode') is-invalid @enderror" id="barcode" name="barcode" value="{{old('barcode')}}"/>
                @error('barcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label class="form-label" for="price">Precio</label>
                <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" />
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label class="form-label" for="stock">Stock</label>
                  <input type="text" id="stock" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{old('stock')}}"/>
                  @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="category" class="form-label">Categoria</label>
                <select name="category" class="form-select @error('category') is-invalid @enderror" id="category">
                    <option selected>Seleccione categoria</option>
                  @foreach ($categories as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                  @endforeach
                </select> 
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="formFileMultiple" class="form-label">Imagenes</label>
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
                <input class="btn btn-secondary col-2 me-2" type="reset" value="Reset">
                <input class="btn btn-primary col-2 ms-2" type="submit" value="Crear">
              </div>
            </div>
        </form>

      </div>
      <!-- / Content -->
  @endsection
@endsection