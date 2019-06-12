<template>
    <div class="product-carousel-wrap">
       <div class="single-product-wrap">
           <!-- <div class="img" v-for="image in product.images" :key="image.id">
               <img :src='"/storage/products/" + image.image' alt=""> {{image.image}}
           </div> -->
           <!-- {{image}} -->
           <div class="img" @click="show=!show">
               <img :src='"/storage/products/" + product.image' alt=""> 
            </div>

            <div class="images-modal-wrap" v-if="show">
                <images-modal :images="images"></images-modal>
            </div>            
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
import singleimagemodal from './SingleImageModal';

 export default {
        components: {
            // "carousel": Carousel,
            "slide": Slide,
            'single-product':singleproduct,
            "hooper": Hooper,
            'images-modal':singleimagemodal
        },
        props:['product'],
        data() {
            return {
                show:false,
                images:[]
            }
        },
        mount(){
            this.images = this.product.images
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
