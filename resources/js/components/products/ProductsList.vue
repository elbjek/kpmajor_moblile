<template>
    <div class="products-list-wrap">
        <h2>Svi oglasi</h2>
        <div v-if="products.length === 0">Loading...</div>
        <router-link :to="'products/'+ product.id" v-for="product in products" :key="product.id" class="product">
            <div class="product-heading">
                    <div class="img">
                    <img :src="'/storage/products/'+product.image">
                    </div>
                    <div class="product-content">
                        <h6>{{product.title}}</h6>
                        <p>{{product.city}}</p>
                        <p>{{product.price}} RSD</p>
                    </div>
            </div>
           <div class="star">
               &#9734;
           </div>
       </router-link>
       </div>
</template>

<script>
    export default {
        data() {
            return {
                'products': [],
                'singleproduct':''
            }
        },
        mounted() {
            this.fetchData()  
        },
        methods:{
            fetchData(){
                axios.get('/api/products')
                .then(response => {
                    this.products = response.data
                })
            }
        }
    }
</script>
