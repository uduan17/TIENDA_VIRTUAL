import './bootstrap';
import { createApp } from 'vue';
import vSelect from "vue-select";


// components---------------------------------------------------
import ExampleComponent from './components/ExampleComponent.vue';
import ProductsList from './components/Products/Index.vue';
import HomeIndex from './components/Home/Home.vue';
import GetAProduct from './components/viewProduct/GetAProduct.vue';
import ViewCart from './components/cart/ViewCart.vue';
import CategoriesList from './components/Categories/Index.vue';
import CategoriesView from './components/CategoriesView/Index.vue';

const app = createApp({
    components:{
        ExampleComponent,
        ProductsList,
		HomeIndex, //Prueba de Home
		GetAProduct,
        CategoriesList,
		ViewCart,
		CategoriesView
    }
})

app.component("v-select", vSelect);
app.mount('#app');
