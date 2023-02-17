<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	<div class="container">
		<a class="navbar-brand w-50" href="{{ url('/') }}">
			<img src="https://i1.wp.com/www.rodelocom.net/wp-content/uploads/2017/04/mi-tienda-online.png?fit=464%2C239&ssl=1" width="100px" alt=""  class="rounded">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav me-auto">
			</ul>
			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ms-auto">

			    <li class="nav-item">
				  <a class="dropdown-item mt-3 mx-2" href="{{ url('/') }}">Home</a>
				</li>

				<li class="nav-item">
				  <a class="dropdown-item mt-2 mx-2" href="{{ route('carrito') }}"><img src="https://cdn-icons-png.flaticon.com/512/3523/3523887.png" width="27px" alt=""></a>
				</li>

				<!-- Authentication Links -->
				@guest
				@if (Route::has('login'))
				<li class="nav-item">
					<a class="nav-link mt-3" href="{{ route('login') }}">Login</a>
				</li>
				@endif

				@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link mt-3" href="{{ route('register') }}">Register</a>
				</li>
				@endif
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle mt-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->full_name }}
					</a>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

						@role('admin')
						{{--Users--}}
						<a class="dropdown-item" href="{{ route('users') }}">Users</a>

						{{--Category--}}
					    <a class="dropdown-item" href="{{ route('categories') }}">Categories</a>

						{{--products--}}
						<a class="dropdown-item" href="{{ route('products') }}">Products</a>
						@endrole

						{{--Logout--}}
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
				</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
