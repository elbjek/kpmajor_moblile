<template>
    <div class="product-carousel-wrap">
        <!-- work in progress -->
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
import singleproduct from '../Product';
    export default {
        components: {
            "carousel": Carousel,
            "slide": Slide
        },
        data() {
            return {
                'product': [],
                'currentUrl': window.location.pathname
            }
        },
        mounted() {
            this.fetchProducts()
        },
        methods:{
            fetchProducts(){
                axios.get('/api'+ this.currentUrl)
                .then(response => {
                    this.product = response.data[0]
                    console.log(this.product)
                })
            }
            
        }
    }
</script>
