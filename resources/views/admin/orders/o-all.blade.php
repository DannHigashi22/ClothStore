@extends('layouts.admin')
@section('title','ClothStore - Administracion de Pedidos')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl min-vh-100">
          <div class="row">
            <div class="col-12">
              <h5 class="card-header">Pedidos</h5>
            </div>
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @elseif(session('message_error'))
                <div class="alert alert-danger">{{session('message_error')}}</div>
            @endif
            
          </div>
            @if (!$orders->isEmpty())
            <div class="col-8 col-sm-5 col-md-4 col-lg-3 col-xl-3 mb-2">
              <input class="form-control" type="text" id="jsearch" placeholder="Ej: op">
            </div>
            <div class="table-responsive h-75">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th>Pedido</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Cliente</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0" id="table-ad">
                      @foreach ($orders as $order)
                          <tr>
                              <td><a href="{{route('a-order',['id'=>$order->id])}}"><i class="text-danger"></i><strong>v{{$order->id}}cs-01</strong></a></td>
                              <td>{{date_format($order->created_at,'d/m/Y')}}</td>
                              <td>{{$order->status}}</td>
                              <td>{{$order->user->full_name}}</td>
                              <td>$ {{$order->total}}</td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            @else
                <div class="alert alert-info">No hay Pedidos generado por parte de clientes</div>
            @endif     
        </div>
        <!-- / Content -->
    </div>
  @endsection
@endsection