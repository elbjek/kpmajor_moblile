<template>
    <div class="product-carousel-wrap">
       <div class="single-product-wrap">
           <!-- <div class="img" v-for="image in product.images" :key="image.id">
               <img :src='"/storage/products/" + image.image' alt=""> {{image.image}}
           </div> -->
           <!-- {{image}} -->
       <div class="single-product-heading-wrap">
           <div class="single-product-info-wrap">
            <div class="single-product-info">
               <h5>{{product.title}}</h5>
               <p>Cena: {{product.price}} RSD</p>
           </div>
           <span>Vidjen:9 puta</span>
           </div>
           <p>{{product.description}}</p>
       </div>
       <div class="product-user-info-wrap">
           <div class="product-user-info-heading">
               <p>Informacije o korisniku:</p>
               <span>Clan od:{{formatTime}}</span>
           </div>
           <div class="product-user-information">
              <div class="user">
                    <h5>{{product.name}} {{product.lastname}}</h5>
                    <span v-bind:class="online=product.online" class="offline"></span>
              </div>
               <p>Lokacija:{{product.city}}</p>
               <button class="btn">Posalji poruku</button>
           </div>
       </div>
    </div>
</div>
</template>

<script>
// import { Carousel, Slide } from 'vue-carousel';
import {Hooper,Slide} from 'hooper';
import singleproduct from './SingleProduct';
 export default {
        components: {
            // "carousel": Carousel,
            "slide": Slide,
            'single-product':singleproduct,
            "hooper": Hooper
        },
        props:['product'],
        data() {
            return {
                // 'product': [],
                // 'next':[],
                // 'previous':[],
                // 'currentUrl': window.location.pathname
            }
        },
        mounted() {
            console.log(this.product.images.slice(0,1)[0])
        },
        methods:{
            // fetchProducts(){ 
            //     axios.get('/api'+ this.currentUrl)
            //     .then(response => {
            //         this.product = response.data[0],
            //         this.previous = response.data[1],
            //         this.next = response.data[2]
            //     })
            // },
            // previousItem(){
            //     var prev = this.product.id - 1
            //     console.log(this.previous.id)
            // },
            // nextItem(){
            //     console.log(this.next)
            //     this.$router.push("/products/"+this.next.id)
            // }
        },
        computed:{
            formatTime(){
                var moment = require('moment');
                var time = this.product.created_at;
               return moment(time).format("MMM Do YY");
            },
            image() {
                return this.product.images.slice(0,1)[0].image
            }
        }
    }
</script>
