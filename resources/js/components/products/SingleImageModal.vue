<template>
    <div class="latest-products-wrap">
        
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
    export default {
         components: {
            "carousel": Carousel,
            "slide": Slide
        },
        props:['images'],
        data() {
            return {
                'allImages':[]   
            }
        },
        beforeMount() {
          this.allImages = this.images.images;
          console.log(this.images)
        },
        methods:{
        
        },
    }
</script>
