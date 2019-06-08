<template>
    <div class="single-product-wrap">
        <carousel :perPage="1" :paginationEnabled="true">
            <slide>
            <div class="img">
                <img src="https://images.unsplash.com/photo-1507007727303-1532f71109cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="">
            </div>
            </slide>
            <slide>
            <div class="img">
                <img src="https://www.love-mobility.co.uk/wp-content/uploads/2018/12/Scooterpac-Cabincar-Telford.jpg" alt="">
            </div>   
            </slide>
        </carousel>

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
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
import moment from 'moment';
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
                })
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
