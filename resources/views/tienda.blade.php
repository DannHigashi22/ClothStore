@extends('layouts.authmain')

@section('title','ClothStore')

@section('content')
    <!--navbar-->
    <nav class="navbar navbar-expand-md navbar-light bg-light p-3 p-md-3">
        <div class="container-fluid">
            <a class="h1 navbar-brand mb-0" href="">ClothStore 🚀</a>
            <ul class="navbar-nav mr-auto mb-0 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="">Quienes somos</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-0">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="javascript:void(0)">Mi perfil </a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)">Mis compras </a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    </ul>
                </li>
              <li class="nav-item">
                <a class="nav-link " href="">Mujer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Hombre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Niño</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Niña</a>
            </li>
            
            </ul>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->full_name}} <i class='bx bx-user'></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="javascript:void(0)">Mi perfil <i class='bx bx-lock-open-alt'></i></a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)">Mis compras <i class='bx bx-cart-alt'></i></a></li>
                            @if (Auth::user()->role->name=='Admin')
                                <li><a class="dropdown-item" href="javascript:void(0)">Gestion Tienda <i class='bx bx-bar-chart-alt-2'></i></a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ 'Cerrar sesion' }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endif
                @endif
              <li class="nav-item">
                <a class="nav-link" href="">Carrito <i class='bx bx-cart'></i></a>
              </li>
            </ul>
          </div>
        </div>
        
    </nav>
    <!-- / navbar-->

    <!-- Content -->
    <div class="container-fluid">
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

        <div class="container text-center p-3 ">
            <h1>Nuestro servicio</h1>
            <p class="fs-3">Acceso a nuestros productos al alcance de 1 click, nuestro servicio se divide en 3 pasos:</p>
        

            <div class="card-group mb-5 mt-2">
                <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h4 class="card-title text-white">Compra <i class='bx bxs-credit-card-alt bx-sm'></i></h4>
                    <p class="card-text">
                    Elige el producto que te gusto, añadelo al carrito, finaliza la compra.</p>
                    <i class='bx bxs-label bx-md' ></i>
                </div>
                </div>
                <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Preparacion <i class='bx bxs-package bx-sm' ></i></h5>
                    <p class="card-text">
                    Listamos y empaquetamos tu pedido conforme a nuestras medidas de seguridad.</p>
                    <i class='bx bxs-label bx-md' ></i>
                </div>
                </div>
                <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Disfruta <i class='bx bx-happy-alt bx-sm' ></i></h5>
                    <p class="card-text">
                        Tu pedido llega a domicilio mediante nuestro servicio de entrega y a disfrutar de su compra</p>
                        <i class='bx bxs-shopping-bag bx-md' ></i>
                </div>
                </div>
            </div>
        </div>

        <h2 class="pb-1 mb-4 text-center">Nuestros productos</h6>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4 mb-5">
                <div class="col">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{asset('img/elements/2.jpg')}}" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{asset('img/elements/13.jpg')}}" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{asset('img/elements/4.jpg')}}" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to additional content.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{asset('img/elements/18.jpg')}}" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{asset('img/elements/19.jpg')}}" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{asset('img/elements/20.jpg')}}" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to additional content.
                        This content is a little bit longer.
                      </p>
                    </div>
                  </div>
                </div>
        </div>

    </div>
    
    <!-- / Content -->
@endsection

