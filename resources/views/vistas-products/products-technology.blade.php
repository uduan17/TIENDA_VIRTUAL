<x-app>
	<div class="button">
<button onclick=(window.history.back(-1)) class="btn btn-outline-success mx-5"> Back to home</button>
	<h3 class="text-center">Technology</h3> <br>
	</div>
<section class="d-flex justify-content-center flex-wrap">
		@foreach ($products as $product)
		@if ($product->category_id === 3)
		<div class="card mx-2 my-2" style="width: 18rem;">
			@if ($product->image)
			<img src="/storage/image/{{$product->image}}" class="card-img-top" alt="...">
			@else
			<img src="https://http2.mlstatic.com/D_NQ_NP_916901-MLA50209920549_062022-O.webp" class="card-img-top" alt="...">
			@endif
			<div class="card-body text-center">
				<h5 class="card-title">{{$product->title}}</h5>
				<strong>Precio</strong> <br> $ {{$product->price}} <br>
				<a href="{{route('getProduct',['product' => $product->id ])}}" class="btn btn-outline-dark">Ver mas...</a>
			</div>
		</div>
		@else

		@endif
		@endforeach
	</section>

</x-app>
