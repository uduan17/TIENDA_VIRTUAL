<template>
	<table class="table" id="productTable"  @click="getEvent">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>stock</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</template>


<script>
export default {
	data() {
		return {
			products: [],
			datatable: {}
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			this.mountDataTable()
		},
		async getProduct() {
			try {
				this.load = false
				const { data } = await axios.get('/Products/GetAllProducts')
				this.products = data.products
				console.log(products);
				this.load = true
			} catch (error) {
				console.error(error)
			}
			this.mountDataTable()
			},
			mountDataTable(){
			    this.datatable = $('#productTable').DataTable({
					Processing: true,
					serverSide: true,
					ajax: {
						url: '/Products/GetAllProductsDataTable'
					},
					columns:[
						{data: 'title'},
						{data: 'stock'},
						{data: 'price'},
						{data: 'action'}
                    ]
				})
			},
			getEvent(event){
				const button = event.target
				if(button.getAttribute('role') == 'edit'){
					this.getProduct(button.getAttribute('data-id'))
				}
				if(button.getAttribute('role') == 'delete'){
					this.deletProduct(button.getAttribute('data-id'))
				}
			},
		async getProduct(product_id) {
			try {
				const { data } = await axios.get(`Products/GetAProduct/${product_id}`)
				this.$parent.editProduct(data.product)
			} catch (error) {
				console.error(error)
			}
		},
		async deletProduct(product_id) {
			try {
				const result = await swal.fire({
						icon: 'question',
						title: 'Quieres eliminar este producto?',
						showCancelButton: true,
						confirmButtonText: 'Si, eliminar'
					})
				if (!result.isConfirmed) return

				this.datatable.destroy();
				await axios.delete(`Products/DeleteProduct/${product_id}`)
				this.index()
				swal.fire({
					icon: 'success',
					title: 'Buen trabajo',
					text: 'Producto eliminado'
				})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>
