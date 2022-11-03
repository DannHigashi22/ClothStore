@include('partials.header')

@include('partials.navbar')

<!-- Content -->
<div class="container-fluid min-vh-100">
    @yield('content')
</div>
<!-- / Content -->
@include('partials.footer')