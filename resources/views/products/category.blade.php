@extends('layouts.shop')

@section('title','producto1')

@section('content')
<div class="container-xxl">
<h2 class="mt-3 text-center">Hombre</h6>
    <select class="form-select w-auto float-right" id="exampleFormControlSelect1" aria-label="Default select example">
        <option value="1">Mayor precio</option>
        <option value="2">Menor precio</option>
        <option value="3">Mas vendido</option>
      </select>
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
@endsection