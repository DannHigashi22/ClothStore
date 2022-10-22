@include('layouts.header')

@section('container')
    @include('partials.menu')
    
    @yield('content')
    
    @include('layouts.footer')
@show
