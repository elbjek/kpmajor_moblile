<template>
    <div class="latest-products-wrap">
        <h1>Najnoviji oglasi</h1>
        <carousel :perPage="3" :paginationEnabled="false" :scrollPerPage="true">
            <slide  class="product" v-for=" product in products" :key="product.id">
                <div class="img">
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
            "carousel":Carousel,
           "slide":Slide
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
