<div class="col">
    <div class="card h-100 text-center">
        @php
            $image=$product->images
        @endphp
        <a class="" href="{{route('s-product',['slug'=>$product->slug])}}">
            <img class="card-img-top" src="{{route('a-product-image',['filename'=>$image[0]->image_path])}}" alt="Card image cap" />
        </a>
        <div class="card-body p-2">
            <h5 class="card-title text-center">{{$product->name}}</h5>
            <p class="card-text">${{$product->price}} CLP</p>
            <form action="{{route('add-cart')}}" method="post">
                @csrf
                <input type="hidden" name="product" value="{{$product->slug}}">
                <button class="btn btn-primary btn-lg" type="submit">Añadir al carro <i class='bx bxs-cart-add bx-sm'></i></button>
            </form>
        </div>
    </div>
</div>