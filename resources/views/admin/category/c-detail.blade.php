@extends('layouts.admin')
@section('title','ClothStore - A-Productos')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
  <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl">
          <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Categoria /</span> Detalle </h4>
          <div class="card mb-4">
            <h5 class="card-header">Categoria detalle : {{$category->name}}</h5>
            <!-- product -->
            <div class="card-body">
                <div class="row">
                    <div class="mb-1 col-12"> 
                        <p><span>Nombre: </span>{{$category->name}}</p>
                        <p><span>Creado: </span>{{date_format($category->created_at,'d-m-Y')}}</p>
                    </div>
                    <div class="mb-3 col-12 table-responsive-sm">
                      @if (!($category->products)->isEmpty())
                        <table class="table table-sm">
                          <thead class="table-dark">
                            <tr>
                              <th>Nombre</th>
                              <th>Precio  </th>
                              <th>Stock</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0" id="table-ad">
                              @foreach ($category->products as $product)
                                  <tr>
                                      <td><a href="{{route('a-product',['slug'=>$product->slug])}}"></i><strong>{{$product->name}}</strong></a></td>
                                      <td>${{$product->price}}</td>
                                      <td>{{$product->stock}}</td>
                                  </tr>
                              @endforeach
                          </tbody>
                        </table>
                      @else
                        <div class="alert alert-primary" role="alert"><i class='bx bxs-info-circle'></i> No hay productos creados para esta categoria, puedes crear haciendo <a href="{{route('a-product-create')}}" class="alert-link">click aqui</a>. </div>
                      @endif
                    </div>
              </div>
            <!-- /product -->
            </div>
        </div>
  </div>
        <!-- / Content -->
  @endsection
@endsection