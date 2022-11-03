@extends('layouts.shop')

@section('title','producto1')

@section('content')
<div class="container-xxl mt-2">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Library</a>
      </li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
  <!--product-->
    <div class="row">
        <div class="col-sm-6 col-lg-4 mb-4" >
            <div class="card">
              <img class="card-img-top" src="{{asset('img/elements/4.jpg')}}" alt="Card image cap">
            </div>
        </div>
        <div class="col-sm-6 col-lg-8 mb-4">
            <div class="">
                <h2>Producto</h2>
                <p>$1000</p>
                <button class="btn btn-primary btn-md" type="button">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
            </div>
            <div class="mt-2">
                <h4>Descripcion</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dolore odio et, similique obcaecati modi natus 
                    dolor consequuntur explicabo illum quas dicta tempora fugiat pariatur, sunt debitis accusamus reprehenderit sit!
                </p>
            </div>
        </div>
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                    Descripcion 
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
                Comentarios
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cumque id autem, consectetur voluptate ea veritatis voluptas amet nulla asperiores velit omnis aliquam error! Ipsam laborum eligendi sed accusantium voluptas.
                </p>
                <p class="mb-0">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi temporibus nesciunt, magnam velit repellendus suscipit voluptatum quas provident consequuntur. Ex corporis dignissimos ratione sed facilis quidem eos voluptatum, voluptatem molestias?
                </p>
              </div>
              <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                <h3>Comentarios de nuestros compradores</h3>
                <div class="row">
                  <div class="col-12">
                    <p class="mb-0">Comprador 1 :</p>
                    <p class="mt-0">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cumque id autem, consectetur voluptate ea veritatis voluptas amet nulla asperiores velit omnis aliquam error! Ipsam laborum eligendi sed accusantium voluptas.
                    </p>
                  </div>
                  <hr>
                  <div class="col-12">
                    <p class="mb-0">Comprador 2 :</p>
                    <p class="mt-0">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cumque id autem, consectetur voluptate ea veritatis voluptas amet nulla asperiores velit omnis aliquam error! Ipsam laborum eligendi sed accusantium voluptas.
                    </p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <h2 class="mb-1 text-center">Productos relacionados</h6>
            <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4 mb-5 mt-0">
                    <div class="col">
                      <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('img/elements/foto1.jpg')}}" alt="Card image cap" />
                        <div class="card-body p-2">
                          <h5 class="card-title text-center">Camisa</h5>
                          <p class="card-text"> $35.000 CLP</p>
                          <button class="btn btn-primary btn-lg" type="button">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('img/elements/13.jpg')}}" alt="Card image cap" />
                        <div class="card-body p-2">
                          <h5 class="card-title text-center">Camisa</h5>
                          <p class="card-text"> $35.000 CLP</p>
                          <button class="btn btn-primary btn-lg" type="button">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('img/elements/4.jpg')}}" alt="Card image cap" />
                        <div class="card-body p-2">
                          <h5 class="card-title text-center">Camisa</h5>
                          <p class="card-text"> $35.000 CLP</p>
                          <button class="btn btn-primary btn-lg" type="button">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card h-100 text-center">
                        <img class="card-img-top" src="{{asset('img/elements/18.jpg')}}" alt="Card image cap" />
                        <div class="card-body p-2">
                          <h5 class="card-title text-center">Camisa</h5>
                          <p class="card-text"> $35.000 CLP</p>
                          <button class="btn btn-primary btn-lg" type="button">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
                        </div>
                      </div>
                    </div>
            </div>
    </div>
</div>
@endsection