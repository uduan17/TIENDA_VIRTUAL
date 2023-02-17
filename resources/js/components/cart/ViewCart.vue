<template>
	<div class="text-center d-flex justify-content-between m-4">
		<div>
			<a href="/" class="btn btn-outline-success">Back To Store</a>
		</div>
	</div>

	<section class="container m-lg-auto text-center m-2 mb-5">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">Image</th>
					<th scope="col">Title</th>
					<th scope="col">Description</th>
					<th scope="col">Price</th>
					<th scope="col">Cantidad</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(product, index) in products" :key="index">
					<td>
						<img :src="`/storage/image/${product.images}`" width="50" height="50"/>
					</td>
					<td>{{ product.title }}</td>
					<td>{{ product.description }}</td>
					<td>${{ product.price }}</td>
					<td class="d-flex"><button @click="product.stock--" class="btn btn-success mx-1"> - </button> {{product.stock}} <button @click="product.stock++" class="btn btn-danger mx-1"> + </button> </td>
					<td>
						<button class="btn btn-danger btn-sm" @click="deleteItem(product)">
							Delete
						</button>
					</td>
				</tr>
			</tbody>
			<td></td>
			<td></td>
			<td></td>
			<td>Total ${{ totalItem }}</td>

		</table>
		<br/>
		<br/>

	</section>

</template>

<script>
import { getData, saveData } from '../../localStorage'

export default {
	props: ['user'],

	data() {
		// if (mas < 1)
        // return  null
		return {
			products: [],
            // productStock : 1
			// mas: null
        }
	},


	created() {
		this.index()
		// getProduct()
	},

   computed: {
    totalItem: function(){
      let sum = 0;
      this.products.forEach(function(product) {
         sum += (parseFloat(product.price) * parseFloat(product.stock));
      });
     return sum;
   }
},

	methods: {
		index() {
			this.products = this.getProduct()
		},
		getProduct() {
			return getData(this.user.id) ?? []
		},
	  async	deleteItem(product) {
			const products = this.products.filter((element) => {
				if (element.id != product.id) return element
			})
				try {
                const result = await swal.fire({
                    title: 'Do you want delete the item?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete'
                })
				if (!result.isConfirmed) return
                swal.fire({
                    icon: 'success',
                    title: 'Congrats!',
                    text: 'Item Deleted!'
                })
            } catch (error) {
                console.error(error);
			}

			console.log(products)
			saveData(this.user.id, products)
			this.index()
		}

	}
}
</script>
