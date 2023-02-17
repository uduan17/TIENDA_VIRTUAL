<x-app>

<div class="container">
<get-a-product :product="{{ $product }}" :user="{{Auth::user()}}"/>
</div>


{{--<div class="button">
<button onclick=(window.history.back(-1)) class="btn btn-outline-success mx-5"> Back</button>
</div>

<section class="d-flex justify-content-center flex-wrap">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-6">
	@if ($product->image)
		<img src="/storage/image/{{$product->image}}" class="card-img-top" alt="...">
		@else
		<img src="https://http2.mlstatic.com/D_NQ_NP_916901-MLA50209920549_062022-O.webp" class="card-img-top" alt="...">
		@endif
    </div>
    <div class="col-md-6">
      <div class="card-body">
		<h5 class="card-title">{{$product->title}}</h5>
		<strong>Price</strong> <br> $ {{$product->price}} <br>
		<strong>Description</strong> <br>  {{$product->description}} <br>
		<strong>Stock</strong> <br> {{$product->stock}} <br>
		<strong>Select stock</strong>
		<input id="number" name="stock" placeholder="Seleccionar cantidad" type="number"  value="1"/>

        <br><br>
            <input type="submit" name="btn"  class="btn btn-success" value="Add to cart">
      </div>
    </div>
  </div>
</div>
</section>--}}

</x-app>

