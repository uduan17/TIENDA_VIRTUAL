<x-app>
    @foreach ($categories as $category)
	 {{--@dd($categories)--}}
	 @if (count($category->product) > 0)
	 <div class="mx-5  d-flex">
	 <h4>{{ $category->name }}</h4>
	 <a class="text-decoration-none mt-1 mb-2 mx-2" href="{{ route('categoriesview.index', ['category' => $category]) }}" class="card-title text-uppercase">
		View all Products
	 </a>
			</div>
            <section class="d-flex justify-content-center flex-wrap text-center">
                        @foreach ($category->product as $count=>$product)
						@break($count == 4)
                            <div class="card mx-2 mb-5 shadow" style="width: 16rem;">
                                @if ($product->images)
                                    <img src="/storage/image/{{ $product->images }}" style="height:230px;">
                                @else
                                    <img src="https://http2.mlstatic.com/D_NQ_NP_913067-MCO53666208687_022023-W.webp" alt="product-image">
                                @endif
                                <div class="card-body">
                                    <strong class="card-text">{{ $product->title }}</strong> <br>
                                    <strong class="text-success ">$ {{ $product->price }}</strong> <br>
									<a href="{{ route('getProduct', ['product' => $product]) }}" class="btn btn-outline-dark mt-3">See more</a>
                            </div>
                        </div>
                    @endforeach
            </section>
			@endif
    @endforeach
</x-app>


<!----------------------------------------------------------------------------------->
{{--@foreach ($products as $count=>$product)
		@break($count == 5)--}}
