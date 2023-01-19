<!--navbar-->
<nav class="navbar navbar-expand-md navbar-light bg-light p-3 p-md-3">
    <div class="container-xxl">
        <a class="h1 navbar-brand mb-0" href="">ClothStore 🚀</a>
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
            <li class="nav-item">
                <a class="nav-link" href="{{route('index')}}">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="javascript:void(0)">Camisas </a></li>
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
                            <li><a class="dropdown-item" href="{{route('admin')}}">Gestion Tienda <i class='bx bx-bar-chart-alt-2'></i></a></li>
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