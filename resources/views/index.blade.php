@extends('layouts.shop')

@section('title','ClothStore')

@section('content')
        <!--carousel-->
        <div id="carouselExample" class="carousel carousel-dark slide mb-2 " data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner ">
              <div class="carousel-item active">
                <img class="d-block"  src="{{asset('img/elements/tienda1.jpg')}}" alt="First slide" />
                <div class="carousel-caption d-none d-md-block">
                  <h3>Bienvenido</h3>
                  <p>Las mejores prendas disponibles a la puerta de su casa</p>
                </div>
              </div>
              <div class="carousel-item ">
                <img class="d-block " src="{{asset('img/elements/tienda2.jpg')}}" alt="Second slide" />
                <div class="carousel-caption d-none d-md-block">
                  <h3>Ropa de dama</h3>
                  <p>Las mejores prendas para usted señorita <p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block" src="{{asset('img/elements/tienda3.jpg')}}" alt="Third slide" />
                <div class="carousel-caption d-none d-md-block">
                  <h3 class="text-white">Ropa de Caballero</h3>
                  <p class="text-white">Las mejores prendas para usted señor o joven en busca de algo nuevo</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
        </div>
        <!---/carousel --->

        <!-- services-->
        <div class="container text-center p-3 ">
            <h1>Nuestro servicio</h1>
            <p class="fs-3">Acceso a productos al alcance de 1 click, nuestro servicio se divide en 3 pasos:</p>
            <div class="card-group mb-5 mt-2">
                <div class="card bg-primary text-white">
                <div class="card-body">
                    <h4 class="card-title text-white">Compra <i class='bx bxs-credit-card-alt bx-sm'></i></h4>
                    <p class="card-text">
                    Elige el producto que te gusto, añadelo al carrito, finaliza la compra.</p>
                    <i class='bx bxs-label bx-md' ></i>
                </div>
                </div>
                <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Preparacion <i class='bx bxs-package bx-sm' ></i></h5>
                    <p class="card-text">
                    Listamos y empaquetamos tu pedido conforme a nuestras medidas de seguridad.</p>
                    <i class='bx bxs-label bx-md' ></i>
                </div>
                </div>
                <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Disfruta <i class='bx bx-happy-alt bx-sm' ></i></h5>
                    <p class="card-text">
                        Tu pedido llega a domicilio mediante nuestro servicio de entrega y a disfrutar de su compra</p>
                        <i class='bx bxs-shopping-bag bx-md' ></i>
                </div>
                </div>
            </div>
        </div>
        <!--- /services --->

        <!---products---->
        <h2 class="pb-1 mb-4 text-center">Nuestros productos</h6>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4 mb-5">
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
                <div class="col">
                  <div class="card h-100 text-center">
                    <img class="card-img-top" src="{{asset('img/elements/19.jpg')}}" alt="Card image cap" />
                    <div class="card-body p-2">
                      <h5 class="card-title text-center">Camisa</h5>
                      <p class="card-text"> $35.000 CLP</p>
                      <button class="btn btn-primary btn-lg" type="button">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100 text-center">
                    <img class="card-img-top" src="{{asset('img/elements/20.jpg')}}" alt="Card image cap" />
                    <div class="card-body p-2">
                      <h5 class="card-title text-center">Camisa</h5>
                      <p class="card-text"> $35.000 CLP</p>
                      <button class="btn btn-primary btn-lg" type="button">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
                    </div>
                  </div>
                </div>
        </div>
        <!--- /products --->
@endsection

