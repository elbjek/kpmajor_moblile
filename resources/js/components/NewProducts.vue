<template>
    <div class="latest-products-wrap">
        <h1>Najnoviji oglasi</h1>
        <carousel :perPage="3" :paginationEnabled="false" :scrollPerPage="true">
            <slide  class="product" v-for=" product in products" :key="product.id">
                <div class="img">
                <img src="https://images2.minutemediacdn.com/image/upload/c_crop,h_1193,w_2121,x_0,y_175/f_auto,q_auto,w_1100/v1554921998/shape/mentalfloss/549585-istock-909106260.jpg">
                </div>
                <div class="product-content">
                <h6>{{product.title}}</h6>
                <p>{{product.price}}</p>
                </div>
            </slide>
        </carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';

    export default {
         components: {
            "carousel": Carousel,
            "slide": Slide
        },
        data() {
            return {
                'products': []   
            }
        },
        mounted() {
            this.fetchData();
        },
        methods:{
            fetchData(){
                axios.get('/api/products/latest')
                .then((response) => {
                    this.products= response.data;
                })
            },
        }
    }
</script>
