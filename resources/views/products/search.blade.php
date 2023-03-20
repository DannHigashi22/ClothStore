@extends('layouts.shop')

@section('title',"ClothStore - $search")


@section('content')
<div class="container-xxl">
<h2 class="mt-3 text-center">Resultado de busqueda : "{{$search}}"</h6>
    @if (!$products->isEmpty())
        <div class="float-left">
            <form method="GET" id="sortproducts">
                <input type="hidden" name="search" value="{{$search}}">
                <label for="orderby" class="form-label mb-0">Ordenar por</label>
                <select name="sort" class="form-select w-auto" id="sort" >
                    <option selected>Mas nuevo</option>
                    <option value="name" {{isset($_GET['sort']) && $_GET['sort']=='name'?'Selected' :''}}>Nombre</option>
                    <option value="price" {{isset($_GET['sort']) && $_GET['sort']=='price'?'Selected' :''}}>Precio</option>
                    <option value="most-sale" {{isset($_GET['sort']) && $_GET['sort']=='most-sale'?'Selected' :''}}>Mas vendido</option>
                </select>
            </form>
        </div>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-5 g-4 mb-5 mt-0">
            @foreach ($products as $product)
                @include('includes.products',['product'=>$product])
            @endforeach
        </div>
    @else
        <br>
        <h4 class="text-center">Lo sentimos no se encontraron productos para tu busqueda</h5>
        <p class="text-center">No te preocupes, prueba otra busqueda! </p>    
    @endif
</div>
@endsection