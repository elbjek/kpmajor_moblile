<template>
    <div class="latest-products-wrap">
        <h1>Najnoviji oglasi</h1>
        <carousel :perPage="2.5" :loop="true" :paginationEnabled="false" >
            <slide class="product" v-for=" product in products" :key="product.id">
                <router-link  :to='"/products/" + product.id' @click="emitEvent">
                    <div class="img" >
                            <img :src="'/storage/products/'+ product.image" alt=""> 
                    </div> 
                    <div class="product-content">
                        <h6>{{product.title}}</h6>
                        <p>{{product.price}}</p>
                    </div>
                </router-link>
            </slide>
        </carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
import {EventBus} from '../../app';
    export default {
         components: {
            "carousel": Carousel,
            "slide": Slide
        },
        data() {
            return {
                'products': [],
                'allImages':[],
                'message':"i got clickeed"  
            }
        },
        beforeMount() {
            this.fetchData();
        },
        methods:{
            fetchData(){
                axios.get('/api/products/latest')
                .then((response) => {
                    this.products= response.data;
                    this.products.forEach(element => {
                        this.allImages.push(element.images)
                    });
                })
            },
            emitEvent(){
                EventBus.$emit('clicked',this.message)
            }
        },
    }
</script>
