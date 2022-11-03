@include('partials.header')

@section('container')
    @include('partials.menu')
    
    @yield('content')

    @include('partials.footer')
@show