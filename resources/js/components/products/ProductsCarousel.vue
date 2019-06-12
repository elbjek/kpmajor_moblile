<template>
   <div>
    <!-- <carousel v-on:transitionStart="transitionStart" v-on:transitionEnd="transitionEnd" :loop="true" :navigateTo="product.id"  :paginationEnabled="false"  :perPage="1">
        <div v-if="allProducts.length === 0">Loading...</div>
        <slide v-for="product in allProducts" :key="product.id">
            <singleproduct class="singleproduct" v-bind:class="{showproduct:show}" :product="product"></singleproduct>
        </slide>     
   </carousel> -->
    <transition name="slide-fade">
        <singleproduct  v-touch:swipe.left="fetchProducts" :product="product"> </singleproduct>
    </transition>
   </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
import singleproduct from './SingleProduct';
import { VueAgile } from 'vue-agile'
    export default {
        components: {
            "carousel": Carousel,
            "slide": Slide,
            'singleproduct':singleproduct,
            'agile': VueAgile
        },
        data() {
            return {
                'product': [],
                'currentUrl': window.location.pathname,
                'allProducts': [],
                'index':'',
                'show':false,
                'previous':[]
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
                    this.previous = response.data[1]
                    this.allProducts = response.data[3]
                    console.log(this.previous)
                })
            },
            // pageChange(){
            //   this.$router.push('/products/'+this.product.id)
            // },
            swipeLeft(){
                this.$router.push('/products/' + this.previous.id);
                vm.$forceUpdate();
            },
            transitionEnd(){
                console.log('ended')
                this.show=true;
            }
        }
    }
</script>

<style scoped>
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>