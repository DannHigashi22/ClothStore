@extends('layouts.admin')
@section('title','ClothStore-Dashboard')
@section('container')
@parent
  @section('content')
      <!-- Content wrapper -->
  <div class="content-wrapper">
      <!-- Content -->
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-lg-8 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Buen dia Administrador 🎉</h5>
                    <p class="mb-4">
                      Pedidos para el dia de hoy : <span class="fw-bold">{{$orderstoday->count()}}</span>. Puede ver los detalles de los pedidos aca: 
                    </p>
                    <a href="{{url("admin/orders?dateRange=$today")}}" class="btn btn-sm btn-outline-primary">Ver Pedidos</a>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{asset('img/illustrations/man-with-laptop-light.png')}}"
                      height="140"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArCAYAAADhXXHAAAAAAXNSR0IArs4c6QAAAjJJREFUWEftmD1LHUEUhp/7CzTkB6hgOoOKRYqAJo21prJQjG0Qol1IY9IE0iURxEqFpI5aWqnBVkiIlQbMHxC0ENvwgobZ2b13Z/eemcsFp7zzcZ597znvnN0GXTQaXcTKPWysf6urlX0GTHjKXAK7wN9YioWe6yv7Dlhpsvk5cBB6cIx1VWCl8GgnFa4CK7HeA1K/I6OswHpvley5pVPeDnSEFIJ8dguYdwAXAP2WfJQpK6B+4NwhU5Gp2JKPEFhBCdC1tBR5K7v86SoSCvsS2EwuJUwDO3dxQ2G1XsXVlxg44z5VYFtdGLGeobayfqHFArw79wqQdf4fVZTVJt/GYgJ/BpbagVWjsx+T0DlbV3stN3D5UhTaL2DEF6VqGmh/ChtbBj5ZwPr9QoyseACoy8uMOsrGLjTdXFNFCtSFjWljGW9txw3cvX6/YJEOOW+1go1RaDlvtYKN0S/kvNUS1rJfKPRWS1jLQiv0VktYnSXzft1mdamw9OA5b7WG1SWhYst0SBXh1WBn+gBLn63IYrO87qXgR9f72QvgBtgATgPwXgHDgAprLWB90Kt42Tm6cb47i5R3T0qAvwKzzp5vwFxZIAtl94BJL9BH4E2T4IPAWcHcI+BPK2AL2CPgqRfkSwuHGAJ+F0A9Bk5iwy4Cq14QvVEctgisuXFn/kfBp9bcdgtldaiAZ4BrYB3YLsm/h8AHYAw4Bt4CFylytiyG2byVsmZAsXM2CaiC3CsbS+p/JyRULLMEz/4AAAAASUVORK5CYII="/>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Pedidos Hoy:</span>
                    <h3 class="card-title mb-2">{{$orderstoday->count()}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img src="data:image/png;base64,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"/>
                      </div>
                    </div>
                    <span>Ventas Hoy:</span>
                    <h3 class="card-title text-nowrap mb-1">${{$orderstoday->sum('total')}}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Total Revenue -->
          <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
              <div class="row row-bordered g-0">
                <div class="col-md-12">
                  <h5 class="card-header m-0 me-2 pb-3">Ventas Anuales</h5>
                  <div id="totalRevenueChart" class="px-2"></div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Total Revenue -->
          <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
              <div class="col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img src="data:image/png;base64,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"/>
                      </div>
                    </div>
                    <span class="d-block mb-1">Pedidos Totales:</span>
                    <h3 class="card-title text-nowrap mb-2">{{$orders->count()}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img src="data:image/png;base64,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"/>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Ventas Totales:</span>
                    <h3 class="card-title mb-2">${{$orders->sum('total')}}</h3>
                  </div>
                </div>
              </div>
              <!-- </div>
<div class="row"> -->
              <div class="col-12 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                      <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                        <div class="card-title">
                          <h5 class="text-nowrap mb-2">Pedidos</h5>
                          <span class="badge bg-label-warning rounded-pill">Ultimos 6 dias</span>
                        </div>
                        <div class="mt-sm-auto">
                          <h3 class="mb-0">$67k</h3>
                        </div>
                      </div>
                      <div id="profileReportChart">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Order Statistics -->
          <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between pb-3">
                <div class="card-title mb-0">
                  <h5 class="m-0 me-2">Productos mas vendidos</h5>
                  <small class="text-muted"> Ventas Totales</small>
                </div>
              </div>
              <div class="card-body pb-0">
                <ul class="p-0 m-0">
                  @foreach ($pMostsales as $product)
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-primary"
                          ><i class="bx bx-closet"></i
                        ></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">{{Str::limit($product->name,18)}}</h6>
                          <small class="text-muted">{{$product->category->name}}</small>
                        </div>
                        <div class="user-progress">
                          <small class="fw-semibold">${{$product->total}}</small>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!--/ Order Statistics -->

          <!-- Expense Overview -->
          <div class="col-md-6 col-lg-4 order-1 mb-4">
            <div class="card h-100">
              <div class="card-header">
                <div class="card-title mb-0">
                  <h5 class="m-0 me-2">Ventas Categorias</h5>
                  <small class="text-muted"> </small>
                </div>
              </div>
              <div class="card-body px-0">
                <div class="tab-content p-0">
                  <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                    <div id="SalesCategoryChart"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Expense Overview -->

          <!-- Transactions -->
          <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Recientes</h5>
              </div>
              <div class="card-body pb-0">
                <ul class="p-0 m-0">
                  {{--dd($recently)--}}
                  <li class="d-flex mb-4 pb-1">
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <small class="text-muted d-block mb-1">Cliente:</small>
                        <h6 class="mb-0">{{$recently[0]}}</h6>
                      </div>
                      <div class="user-progress d-flex align-items-center gap-1">
                        <a href="{{route('a-users')}}">Ver mas <i class='bx bx-right-arrow-alt'></i></a>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex mb-4 pb-1">
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <small class="text-muted d-block mb-1">Productos:</small>
                        <h6 class="mb-0">{{$recently[1]}}</h6>
                      </div>
                      <div class="user-progress d-flex align-items-center gap-1">
                        <a href="{{route('a-products')}}">Ver mas <i class='bx bx-right-arrow-alt'></i></a>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex mb-4 pb-1">
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <small class="text-muted d-block mb-1">Ordenes:</small>
                        <h6 class="mb-0">v{{$recently[2]}}cs-01</h6>
                      </div>
                      <div class="user-progress d-flex align-items-center gap-1">
                        <a href="{{route('a-orders')}}">Ver mas <i class='bx bx-right-arrow-alt'></i></a>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex mb-4 pb-1">
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <small class="text-muted d-block mb-1">Categoria:</small>
                        <h6 class="mb-0">{{$recently[3]}}</h6>
                      </div>
                      <div class="user-progress d-flex align-items-center gap-1">
                        <a href="{{route('a-categories')}}">Ver mas <i class='bx bx-right-arrow-alt'></i></a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!--/ Transactions -->
        </div>
      </div>
      <!-- / Content -->
  @endsection
@endsection