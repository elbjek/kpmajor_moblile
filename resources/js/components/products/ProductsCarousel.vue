<template>
   <carousel v-on:transitionStart="transitionStart" v-on:transitionEnd="transitionEnd" :loop="true" :navigateTo="product.id"  v-on:pageChange="pageChange" :paginationEnabled="false"  :perPage="1">
    <div v-if="allProducts.length === 0">Loading...</div>
    <slide v-for="product in allProducts" :key="product.id">
        <singleproduct class="singleproduct" v-bind:class="{showproduct:show}" :product="product"></singleproduct>
    </slide>     
   </carousel>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
import singleproduct from './SingleProduct';
    export default {
        components: {
            "carousel": Carousel,
            "slide": Slide,
            'singleproduct':singleproduct
        },
        data() {
            return {
                'product': [],
                'currentUrl': window.location.pathname,
                'allProducts': [],
                'index':'',
                'show':false
            }
        },
        beforeMount(){
             this.index = this.currentUrl.substring(this.currentUrl.lastIndexOf('/') + 1);
        },
        mounted() {
            this.fetchProducts()
        },
        methods:{
            fetchProducts(){
                axios.get('/api'+ this.currentUrl)
                .then(response => {
                    this.product = response.data[0]
                    this.allProducts = response.data[3]
                })
            },
            pageChange(){
              this.$router.push('/products/'+this.product.id)
            },
            transitionStart(){
                console.log('started')
            },
            transitionEnd(){
                console.log('ended')
                this.show=true;
            }
        }
    }
</script>
