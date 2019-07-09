<template>
  <div class="product-carousel-wrap">
    <div class="single-product-wrap">
      <!-- <div class="img" v-for="image in product.images" :key="image.id">
               <img :src='"/storage/products/" + image.image' alt=""> {{image.image}}
      </div>-->
      <!-- {{image}} -->
      <div class="img image" style="transform-origin:top" @click="show=!show">
        <img :src="'/storage/products/' + product.image" alt />
      </div>

      <!-- <div class="images-modal-wrap" v-if="show">
                <images-modal :images="images"></images-modal>
      </div>-->
      <div class="single-product-heading-wrap">
        <div class="single-product-info-wrap">
          <div class="single-product-info">
            <h5>{{product.title}}</h5>
            <p>Cena: <span>{{product.price}}</span> RSD</p>
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
import { Hooper, Slide } from "hooper";
import singleproduct from "./SingleProduct";
import singleimagemodal from "./SingleImageModal";
import comment from "../comments/singleComment";

export default {
  components: {
    // "carousel": Carousel,
    slide: Slide,
    "single-product": singleproduct,
    hooper: Hooper,
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
  mounted() {
    // this.images = this.product.images;
    let _this = this;
    window.onscroll = this.scrollImage
  },
  methods: {
        scrollImage() {
        if (document.body.scrollTop > 37 || document.documentElement.scrollTop > 37 ) {
            $('.single-product-wrap .image').addClass('shrinkImage')
        } else {
            $('.single-product-wrap .image').removeClass('shrinkImage')
        }
        },
    handleScroll() {
      console.log("scrolling");
    }
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
