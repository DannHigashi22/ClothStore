<form id="formAuthentication" class="mb-3" action="{{route($url)}}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="full_name" class="form-label">Nombres </label>
    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" placeholder="Ingrese nombres" autofocus/>
    @error('full_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="surnames" class="form-label">Apellidos</label>
    <input type="text" class="form-control @error('surnames') is-invalid @enderror" id="surnames" name="surnames" placeholder="Ingrese sus apellidos" autofocus/>
    @error('surnames')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingresa tu email" />
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="phone">Telefono</label>
    <input type="text" id="phone" name="phone" class="form-control phone-mask @error('phone') is-invalid @enderror" placeholder="912345678"/>
    @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="password">Contraseña</label>
    <div class="">
      <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" aria-describedby="password"/>
      @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
  </div>
  <div class="mb-3">
    <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  </div>

  @auth
  @if (Auth::user()->role->name == 'Admin')
  <div class="mb-3">
    <label for="Role" class="form-label">Role</label>
    <select name="role" class="form-select" id="role" aria-label="Default select example">
      <option value="1">Admin</option>
      <option value="2" selected>Usuario/Cliente</option>
    </select> 
  </div>
  @endif
  @else
  <div class="mb-3">
    <div class="form-check">
      <input class="form-check-input @error('terms') is-invalid @enderror " type="checkbox" id="terms-conditions" name="terms" required />
      <label class="form-check-label" for="terms-conditions">
        Acepto los
        <a href="javascript:void(0);">Terminos de privacidad</a>
      </label>
      @error('terms')
        <span class="invalid-feedback" role="alert">
            <strong>{{ 'Acepte terminos para continuar' }}</strong>
        </span>
      @enderror
    </div>
  </div>
  @endauth

  <button class="btn btn-primary d-grid w-100">Registrar</button>
</form>