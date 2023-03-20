@extends('layouts.admin')
@section('title','ClothStore - Orden')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
  <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl">
          <h3 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Ordenes /</span> Detalle </h3>
          <div class="card mb-4">
            <h4 class="card-header">Orden : v{{$order->id}}cs-01</h4>
            <!-- product -->
            <div class="card-body">
                <div class="row">
                    <h5>Datos de cliente:</h5>
                    <p><span class="form-label">Fecha Compra:</span> {{$order->created_at}}</p>
                  <div class="mb-1 col-md-6"> 
                    <p><span>Nombre:</span> {{$order->user->full_name.' '.$order->user->surnames}}</p>
                    <p><span>Telefono:</span> {{$order->user->phone}}</p>
                    <p><span>Email:</span> {{$order->user->email}}</p>
                  </div>
                  <div class="mb-1 col-md-6">
                    <p><span class="form-label">Direccion</span> {{$order->shipping_address}}</p>
                    <p><span class="form-label">Estado:</span> {{$order->status}}</p>
                    <p><span class="form-label">Total:</span> {{$order->total}}</p>
                  </div>
              </div>
              <div class="mb-3 col-md-12">
                <div class="row">
                    <h5>Productos:</h5>
                  <table class="table table-borderless">
                    <tbody>
                    @foreach ($order->detail as $item)
                        <tr class="row">
                            <td class="col-12 col-sm-12 col-md-5 row">
                                <div class="col-3 pe-2">
                                    <a href="">
                                        <img src="{{ route('a-product-image',['filename'=> $item->product->images[0]->image_path])}}" class="img-cart" alt="Thumbnail">
                                    </a>
                                </div>
                                <div class="col-9 ps-2 justify-content-center d-flex align-items-center">
                                    <a href="{{route('s-product',['slug'=>$item->product->slug])}}" class="fs-5">{{ $item->product->name }}</a>
                                </div>
                            </td>
                            <td class="col-6 col-sm-6 col-md-3 justify-content-center d-flex align-items-center ">
                                <span class="fs-5">
                                    ${{ $item->price }}
                                </span> 
                            </td>
                            <td class="col-6 col-sm-6 col-md-2 justify-content-center d-flex align-items-center">
                                <span class="fs-5">
                                    {{ $item->quantity }}Un
                                </span>
                            </td>
                            <td class="col-12 col-sm-12 col-md-2 justify-content-center d-flex align-items-center">
                                <span class="fs-5">
                                    ${{ $item->total }}
                                </span>
                            </td>
                        </tr>  
                    @endforeach
                    </tbody>
                    </table>
                </div>
              </div>
            <!-- /product -->
            </div>
        </div>
  </div>
        <!-- / Content -->
  @endsection
@endsection