<template>
	<div class="button">
		<button onclick="(window.history.back(-1))" class="btn btn-outline-success mx-5">
			Back
		</button>
	</div>
	<section class="d-flex justify-content-center flex-wrap">
		<div class="card mb-3 shadow" style="max-width: 540px; height:285px;">
			<div class="row g-0">
				<div class="col-md-6 ">
				  <img :src="`/storage/image/${product.images}`" class=" img-fluid rounded-start" alt="..." style="height:285px;">
				</div>
				<div class="col-md-6">
					<div class="card-body mx-2">
						<h5>{{ product.title }}</h5>
						<strong>Price</strong> <br />$ {{ product.price }} <br />
						<strong>Description</strong> <br />{{ product.description }} <br />
						<input type="submit" name="btn" class="btn btn-success mt-2" value="Add to cart" @click="addToCart(product)"/>
					</div>
				</div>
			</div>
		</div>

	</section>
	<br/>
		<br/>
</template>

<script>
import { getData, saveData } from '../../localStorage'

export default {
	props: ['product', 'user'],

	methods: {
		addToCart(product) {
			console.log(product)
			let data = getData(this.user.id)
			if (!data) data = []
			data = [...data, product]
			console.log(data)
			saveData(this.user.id, data)
            swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Your Products add to cart',
				showConfirmButton: false,
				timer: 1500
			})
			if (!this.user.id)
				swal.fire({
					icon: 'error',
					title: 'Opps!',
					text: 'You must register or log in!'
				})
		}
	}
}
</script>

