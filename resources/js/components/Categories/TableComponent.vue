<template>
<div class="table-bordered table-responsive-md">
<table class="table" id="categoryTable" @click="getEvent">
    <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
</template>

<script>
export default {
    data() {
        return {
            categories: [],
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

        mountDataTable() {
            this.datatable = $('#categoryTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/Categories/GetAllCategoriesDataTable'
                },
				columns: [
					{ data: 'id' },
                    { data: 'name' },
                    { data: 'action' }
                ]
            })
        },

        async getCategories() {
            try {
                this.load = false
                const { data } = await axios.get('Categories/GetAllCategories')
                this.categories = data.categories
                this.load = true
            } catch (error) {
                console.error(error)
            }
            this.mountDataTable()
        },

        getEvent(event) {
            const button = event.target
            if (button.getAttribute('role') == 'edit') {
                this.getCategory(button.getAttribute('data-id'))
            }
            if (button.getAttribute('role') == 'delete') {
                this.deleteCategory(button.getAttribute('data-id'))
            }
        },

        async getCategory(category_id) {
            try {
                const { data } = await axios.get(`Categories/GetACategory/${category_id}`)
                this.$parent.editCategory(data.category)
            } catch (error) {
                console.error(error);
            }
        },

        async deleteCategory(category_id) {
            try {
                const result = await swal.fire({
                    title: 'Do you want delete the category?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete'
                })
                if (!result.isConfirmed) return

                this.datatable.destroy()
                await axios.delete(`Categories/DeleteACategory/${category_id}`)
                this.index()
                swal.fire({
                    icon: 'success',
                    title: 'Congrats!',
                    text: 'Category Deleted!'
                })
            } catch (error) {
                console.error(error);
            }
        }
    },
}
</script>
