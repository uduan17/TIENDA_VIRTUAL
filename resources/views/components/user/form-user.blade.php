{{--Roles--}}
<div class="mb-3">
	<label for="role" class="form-label">Role</label>
	<select name="role" id="role" class="form-control">
		@foreach ($roles as $role)
		<option value="{{$role}}">{{$role}}</option>
		@endforeach
	</select>
	<!-- selected="{{(isset($user) ? ($role == $user->roles[0]->name ? true: false): '')}}" -->
	<!-- <input type="text" name="roles" class="form-control @error ('role') is-invalid @enderror#" value="{{old('role')? old('role'): (isset($user)? $user->role: '')}}"> -->

	@error('role')
	<span class="invalid-feedback" role="alert">
		<strong>{{$message}}</strong>
	</span>
	@enderror
</div>

{{--name--}}
<div class="mb-3">
	<label for="exampleInputPassword1" class="form-label">Nombre</label>
	<input type="text" name="name" class="form-control @error ('name') is-invalid @enderror#" value="{{old('name')? old('name'): (isset($user)? $user->name: '')}}">

	@error('name')
	<span class="invalid-feedback" role="alert">
		<strong>{{$message}}</strong>
	</span>
	@enderror
</div>

{{--last_name--}}
<div class="mb-3">
	<label for="exampleInputPassword1" class="form-label">Apellido</label>
	<input type="text" name="last_name" class="form-control @error ('last_name') is-invalid @enderror#" value="{{old('last_name')? old('last_name'): (isset($user)? $user->last_name: '')}}">

	@error('last_name')
	<span class="invalid-feedback" role="alert">
		<strong>{{$message}}</strong>
	</span>
	@enderror
</div>

{{--email--}}
<div class="mb-3">
	<label for="exampleInputPassword1" class="form-label">Correo</label>
	<input type="email" name="email" class="form-control @error ('email') is-invalid @enderror#" value="{{old('email')? old('email'): (isset($user)? $user->email: '')}}">

	@error('email')
	<span class="invalid-feedback" role="alert">
		<strong>{{$message}}</strong>
	</span>
	@enderror
</div>

{{--password--}}
<div class="mb-3">
	<label for="exampleInputPassword1" class="form-label">Contraseña</label>
	<input type="password" name="password" class="form-control @error ('password') is-invalid @enderror#" value="{{old('password')? old('password'): ''}}">

	@error('password')
	<span class="invalid-feedback" role="alert">
		<strong>{{$message}}</strong>
	</span>
	@enderror
</div>

{{--confirm password--}}
<div class="mb-3">
	<label for="exampleInputPassword1" class="form-label">Confirmar contraseña</label>
	<input type="password" name="password_confirmation" class="form-control @error ('password_confirmation') is-invalid @enderror#" value="{{old('password_confirmation')? old('password_confirmation'): ''}}">

	@error('password_confirmation')
	<span class="invalid-feedback" role="alert">
		<strong>{{$message}}</strong>
	</span>
	@enderror
</div>

{{--Buttons--}}
<a href="../../Users" class="btn btn-danger me-2">Cancelar</a>
<button type="submit" class="btn btn-success">Enviar</button>
