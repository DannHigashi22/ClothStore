@extends('layouts.shop')
@section('title',"ClothStore - $product->name")

@section('content')
<div class="container-xxl mt-2">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
      <li class="breadcrumb-item">
        <a href="{{route('index')}}">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('s-category',['slug'=>$product->category->slug])}}">{{$product->category->name}}</a>
      </li>
      <li class="breadcrumb-item active">{{$product->name}}</li>
    </ol>
  </nav>
  <!--product-->
    <div class="row">
        <div class="col-sm-6 col-lg-4 mb-4" >
            <div class="card">
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($product->images as $key =>$image)
                    <div class="carousel-item {{$key==1 ?'active' :''}}">
                      <img class="card-img-top" src="{{route('a-product-image',['filename'=>$image->image_path])}}" alt="Card image cap">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-8 mb-4">
            <div class="">
                <h2>{{$product->name}}</h2>
                <h3>${{$product->price}}</h3>
                <form action="{{route('add-cart')}}" method="post">
                  @csrf
                  <input type="hidden" name="product" value="{{$product->slug}}">
                  @if (($product->stock) > 1 )
                  <button type="submit" class="btn btn-primary btn-md" type="button">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
                  @else
                      <div class="alert alert-warning">Sin Stock, en proximos dias tendremos mas de tus productos favoritos</div>
                  @endif
              </form>
            </div>
            <div class="mt-2">
                <h4>Descripcion</h4>
                <p>{{$product->description}}</p>
            </div>
        </div>
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                    Descripcion 
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
                Comentarios
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                {!!$product->description!!}
              </div>
              <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                <div class="row">
                  @if (count($product->commentaries) !=0)
                  <h3 class="text-center">Comentarios de nuestros compradores</h3>
                    @foreach ($product->commentaries as $commentary)
                      <div class="col-12">
                        <p class="mb-0">{{$commentary->user->full_name}} : 
                          <i class='bx {{$commentary->star >=1 ?'bxs-star': 'bx-star' }}'></i>
                          <i class='bx {{$commentary->star >=2 ?'bxs-star': 'bx-star' }}'></i>
                          <i class='bx {{$commentary->star >=3 ?'bxs-star': 'bx-star' }}'></i>
                          <i class='bx {{$commentary->star >=4 ?'bxs-star': 'bx-star' }}'></i>
                          <i class='bx {{$commentary->star >=5 ?'bxs-star': 'bx-star' }}'></i>
                        </p>
                        <p class="mt-0">
                          {{$commentary->description}}
                        </p>
                      </div>
                    @endforeach
                  @else
                    <div class="col-12">
                      <h4>Sin Comentarios, compra este productos y ¡dejamos tu opinion de como te fue¡</h4>
                    </div>
                  @endif
                  
                </div>
              </div>
              
            </div>
          </div>
          <h2 class="mb-1 text-center">Productos relacionados</h6>
            <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-4 mb-5 mt-0">
              @foreach ($product->category->products as $cproduct)
                @if ($product->id != $cproduct->id)
                  @include('includes.products',['product'=>$cproduct])
                @endif
              @endforeach
            </div>
    </div>
</div>
@endsection