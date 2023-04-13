@extends('layouts.admin')
@section('title','ClothStore - Administracion de Pedidos')
@section('container')
@parent
    @section('content')
        <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFilter" aria-labelledby="offcanvasFilterLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasFilterLabel">Filtrar Por</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form action="" method="get" class="filter-form">
              <div class="mb-1">
                <input type="text" class="form-control form-control-solid" placeholder="Fecha" id="filter-date" name="dateRange" autocomplete="off" value="{{request('dateRange')? request('dateRange'): ''}}">
              </div>
                <div class="form-floating mt-1">
                  <select class="form-select" name="status" aria-label="Status-Order">
                    <option value="">Todos</option>
                    <option value="1" {{request('status')== 1 ? 'selected' :''}}>Recibido</option>
                    <option value="2" {{request('status')== 2 ? 'selected' :''}}>Preparacion</option>
                    <option value="3" {{request('status')== 3 ? 'selected' :''}}>Enviado</option>
                    <option value="4" {{request('status')== 4 ? 'selected' :''}}>Entregado</option>
                  </select>
                  <label for="floatingSelect">Estado de Pedido</label>
                </div>
                <div class="mt-2">
                  <input class="btn btn-primary" type="submit" value="Aplicar">
                  <input class="btn btn-secondary" id="reset-filter"type="button" value="Borrar Filtros">
                </div>
            </form>
          </div>
        </div>
        <div class="container-xxl min-vh-100">
          <div class="row">
            <div class="col-12">
              <h4 class="card-header">Pedidos</h4>
            </div>            
          </div>
          <div class="row">
              <div class="col-6 col-sm-5 col-md-4 col-lg-3 col-xl-3 mb-3">
                <input class="form-control" type="text" id="jsearch" placeholder="Ej: op">
              </div>
              <div class="col-6 col-sm-5 col-md-4 col-lg-3 col-xl-3 mb-3">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasFilter">
                Filtrar Por
                </button>
              </div>
          </div>
            @if (!$orders->isEmpty())
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
                              <td>{{stringstatus($order->status)}}</td>
                              <td>{{$order->user->full_name}}</td>
                              <td>$ {{$order->total}}</td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>

            @else
                <div class="alert alert-primary">No hay Pedidos generado por parte de clientes</div>
            @endif     
        </div>
        <!-- / Content -->
    </div>
  @endsection
@endsection