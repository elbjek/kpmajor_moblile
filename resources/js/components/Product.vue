<template>
   <!-- <carousel :loop="true" v-on:pageChange="pageChange" :perPage="1"> -->
    <!-- <slide  v-for="product in next" :key="product.id"> -->
        <singleproduct :product="product"></singleproduct>
    <!-- </slide>      -->
   <!-- </carousel> -->
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
import moment from 'moment';
import singleproduct from './products/SingleProduct';
    export default {
        components: {
            "carousel": Carousel,
            "slide": Slide,
            'singleproduct':singleproduct
        },
        data() {
            return {
                'product': '',
                'next':[],
                'previous':[],
                'currentUrl': window.location.pathname
            }
        },
        beforeMount() {
            this.fetchProducts()
        },
        methods:{
            fetchProducts(){
                axios.get('/api'+ this.currentUrl)
                .then(response => {
                    this.product = response.data[0],
                    this.previous = response.data[1],
                    this.next = response.data[2]
                    // console.log(response.data)
                    // console.log(this.product)
                })
            },
            previousItem(){
                var prev = this.product.id - 1
                this.$router.push("/products/" + this.previous.id)
            },
            nextItem(){
                console.log(this.next)
                this.$router.push("/products/"+this.next.id)
            },
            pageChange(){
                var prev = this.product.id - 1
                this.$router.push("/products/" + prev)
            }
        },
        computed:{
            formatTime(){
                var moment = require('moment');
                var time = this.product.created_at;
               return moment(time).format("MMM Do YY");
            }
        }
    }
</script>
