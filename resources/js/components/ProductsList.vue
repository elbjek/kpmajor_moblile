<template>
    <div class="products-list-wrap">
        <h2>Svi oglasi</h2>
        <div v-if="products.length === 0">Loading...</div>
        <a :href="'products/'+ product.id" v-for="product in products" :key="product.id" class="product">
           <div class="product-heading">
                <div class="img">
                <img src="https://images2.minutemediacdn.com/image/upload/c_crop,h_1193,w_2121,x_0,y_175/f_auto,q_auto,w_1100/v1554921998/shape/mentalfloss/549585-istock-909106260.jpg">
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
       </a>
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
