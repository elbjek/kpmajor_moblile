<template>
  <div class="product-carousel-wrap">
    <div class="single-product-wrap">
          <!-- <v-touch class=""></v-touch> -->
          <carousel :perPage="1" :loop="true" :paginationEnabled="true" class="image-carousel">
           <slide class="img image" >
            <img :src="'/storage/products/' + product.image" alt />
          </slide>
            <slide class=" img image" v-for="image in product.images" :key="image.id">
            <img :src="'/storage/products/' + image.image" alt />
          </slide>
          </carousel>

      <div class="single-product-heading-wrap">
        <div class="single-product-info-wrap">
          <div class="single-product-info">
            <h5>{{product.title}}</h5>
            <p>
              Cena:
              <span>{{product.price}}</span> RSD
            </p>
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
          <div class="user-info">
            <div class="user">
              <h5>{{product.name}} {{product.lastname}}</h5>
              <span v-bind:class="online=product.online" class="offline"></span>
            </div>
            <div class="rating">
              <div class="upvotes">
                <i class="fas fa-chevron-up"></i>
                <span>15</span>
              </div>
              <div class="downvotes">
                <i class="fas fa-chevron-down"></i>
                <span>9</span>
              </div>
            </div>
          </div>
          <p>
            Lokacija:
            <span>{{product.city}}</span>
          </p>
          <button class="btn">Posalji poruku</button>
        </div>
      </div>
      <div class="comments">
        <single-comment></single-comment>
      </div>
    </div>
  </div>
</template>

<script>
// import { Carousel, Slide } from 'vue-carousel';

import { Carousel, Slide } from "vue-carousel";
import singleproduct from "./SingleProduct";
import singleimagemodal from "./SingleImageModal";
import comment from "../comments/singleComment";

export default {
  components: {
    carousel: Carousel,
    slide: Slide,
    "single-product": singleproduct,
    "images-modal": singleimagemodal,
    "single-comment": comment
  },
  props: ["product"],
  data() {
    return {
      show: false,
      images: []
    };
  },
  beforeUpdate() {
    this.images = this.product.images;
    let _this = this;
    window.onscroll = this.scrollImage;
  },
  methods: {
    scrollImage() {
      if (
        document.body.scrollTop > 37 ||
        document.documentElement.scrollTop > 37
      ) {
        $(".single-product-wrap .image").addClass("shrinkImage");
      } else {
        $(".single-product-wrap .image").removeClass("shrinkImage");
      }
    },
    showCarousel() {

        $('.image-carousel').addClass('image-carousel-scale')
        $('.transparent-background').addClass('trans-bg')
        $('body').addClass('overflow')
    },
    hideCarousel(){
        $('.image-carousel').removeClass('image-carousel-scale')
        $('.transparent-background').removeClass('trans-bg')
        $('body').removeClass('overflow')


    },

  },
  computed: {
    formatTime() {
      var moment = require("moment");
      var time = this.product.created_at;
      return moment(time).format("MMM Do YY");
    }
  }
};
</script>

