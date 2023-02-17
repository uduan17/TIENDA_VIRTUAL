<template>
	<div class="my-3">
		<a href="/" class="btn btn-outline-success">Back To Store</a>
	</div>
	<h3 class="text-center">All products of the category: {{ this.category.name }}</h3>
	<section class="text-center d-flex justify-content-center flex-wrap">
		<div
			class="card mx-2 mb-5 shadow"
			style="width: 16rem"
			v-for="(product, index) in this.category.product" :key="index">

			<img :src="`/storage/image/${product.images}`" style="height: 230px" />
			<div class="card-body">
				<h4 class="card-title">{{ product.title }}</h4>
				<p class="card-text">${{ product.price }}</p>
				<a :href="`/GetProduct/${product.id}`" class="btn btn-outline-dark">See more...</a>
			</div>
		</div>
	</section>
</template>

<script>
export default {
	props: ['category'],

	data() {
		return {}
	},

	created() {
		this.index()
	},

	methods: {
		async index() {}
	}
}
</script>
