@extends('layouts.shop')

@section('title',"ClothStore -Carrito")


@section('content')
<div class="container-lg">
    <div class="col mt-3">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center">Carrito</h3>
                @if (!$cart->isEmpty())
                    <table class="table table-borderless" id="table-cart">
                            <tbody>
                            @foreach ($cart as $item)
                                <tr class="row">
                                    <td class="col-12 col-sm-12 col-md-5 row">
                                        <div class="col-3 pe-2">
                                            <a href="">
                                                <img src="{{ route('a-product-image',['filename'=> $item->attributes->image])}}" class="img-cart" alt="Thumbnail">
                                            </a>
                                        </div>
                                        <div class="col-9 ps-2 justify-content-center d-flex align-items-center">
                                            <a href="" class="fs-5">{{ $item->name }}</a>
                                        </div>
                                    </td>
                                    <td class="col-6 col-sm-6 col-md-3 justify-content-center d-flex align-items-center ">
                                        <div class="quantity-card">
                                            <form action="{{route('cart-update')}}" method="POST">
                                            @csrf
                                            <div class="input-group ">
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control cartupdate" />
                                                <span class="input-group-text">.Un</span>
                                            </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="col-6 col-sm-6 col-md-2 justify-content-center d-flex align-items-center">
                                        <span class="fs-5">
                                            ${{ ($item->quantity*$item->price) }}
                                        </span>
                                    </td>
                                    <td class="col-12 col-sm-12 col-md-2 justify-content-center d-flex align-items-center">
                                        <form action="{{route('cart-remove')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button class="btn btn-danger float-end"><i class="bx bxs-trash-alt"></i></button>
                                        </form> 
                                    </td>
                                </tr>  
                            @endforeach
                            </tbody>
                    </table>
                  <hr>
                  SubTotal: {{\Cart::getSubTotal()}}
                  Total :{{\Cart::getTotal()}}
                  <hr>
                  <a href="{{route('cart-clear')}}" class="btn btn-info">Vaciar Carro</a>
                  <button class="btn btn-primary">Continuar Comprar</button>
                @else
                  <div class="text-center">
                    <p class="">Tu carrito esta vacio</p>  
                    <p class="">¿No sabes qué comprar? ¡Miles de productos te esperan!</p>
                    <a class="btn btn-primary mt-3" href="{{route('index')}}">Ver Productos</a> 
                  </div>
                @endif
            
          </div>
        </div>
    </div>
</div>
@endsection