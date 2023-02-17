<template>
<section class="d-grid gap-2 justify-content-center flex-wrap p-2 text-center">
    <div class="container" v-for="(cat, index) in category" :key="index">
        <a href="" class="card-title text-uppercase">
            <h6>{{ cat.name }}</h6>
        </a>
        <div class="container d-flex gap-2" v-for="(product, index) in products" :key="index">
            <div class="card-group d-flex gap-2">
                <div class="card p-2">
                    <img src="https://picsum.photos/230/230" class="card-img-top" alt="product-image">
                    <div class="card-body">
                        <p class="card-text">{{ product.name }}</p>
                        <p class="card-text">{{ product.category_id }}</p>
                        <h6>$ {{ product.price }}</h6>
                    </div>
                    <!-- <a href="/ProductsView" class="btn btn-primary" @click="seeProduct(product.id)">See Product</a> -->
                    <a href="/vistas-products" class="btn btn-primary">See Product</a>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>

export default {
	data() {
		return {
            category: [],
            products: [],
        }
    },

    created() {
        this.index()
    },

    methods: {
        async index() {
			this.getAllCategoriesWithProducts()
			this.getProducts()
        },

        async getAllCategoriesWithProducts() {
            const { data } = await axios.get('CategoriesView/GetAllCategoriesWithProducts')
            // console.log(data)
            this.category = data.category
        },

        async getProducts() {
            const { data } = await axios.get('Products/GetAllProducts')
			// console.log(data)
			this.products = data.products
		},

		async seeProduct(product) {
			try {
				const { data } = await axios.get(`ProductsView/GetAProduct/${product}`)
				console.log(data)
			} catch (error) {
				console.error(error)
			}
		},
    },
}
</script>
