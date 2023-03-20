<!--navbar-->
<nav class="navbar navbar-expand-md navbar-light bg-light p-3 p-md-3">
    <div class="container-xxl">
        <a class="h1 navbar-brand mb-0" href="{{route('index')}}">ClothStore 🚀</a>
        <ul class="navbar-nav mr-auto mb-0 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="">Quienes somos</a>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-0">
    <div class="container-xxl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{route('s-category',['slug'=>$category->slug])}}">{{$category->name}} </a></li>
                    @endforeach
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
            <div class="">
                <form class="d-flex" method="GET" action="{{route('search')}}">
                    <input class="form-control me-o border-0 shadow-none" type="text" placeholder="Buscar" aria-label="Search" name="search" value="{{isset($search) ? $search :''}}">
                    <button class="btn btn-primary" type="submit"><i class='bx bx-search-alt-2'></i></button>
                </form>
            </div>
            @if (Route::has('login'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mi cuenta
                    </a>
                    @auth
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item-text">!Hola {{Auth::user()->full_name}} <hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="javascript:void(0)"><i class='bx bx-user'></i> Mi perfil</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)"><i class='bx bx-cart-alt'></i> Mis compras</a></li>
                        @if (Auth::user()->role->name=='Admin')
                            <li><a class="dropdown-item" href="{{route('admin')}}"><i class='bx bx-bar-chart-alt-2'></i> Gestion Tienda </a></li>
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
                        @else
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="{{ route('login') }}" class="dropdown-item"> Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="dropdown-item"> Register</a>
                                </li>
                            @endif
                        </ul>
                    @endif
                </li>
            @endif
          <li class="nav-item">
            <a class="nav-link" href="{{route('cart')}}"><i class='bx bxs-cart' ></i> <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">{{ Cart::getTotalQuantity()}}</span>  </a>
          </li>
        </ul>
      </div>
    </div>
    
</nav>
<!-- / navbar-->