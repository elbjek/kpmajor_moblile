<template>
  <div class="loader">
    <span class="circle red"></span>
    <span class="circle orange"></span>
    <!-- <span class="circle green"></span>
    <span class="circle lightblue"></span>
    <span class="circle darkblue"></span> -->
  </div>

</template>

<script>
export default {  
    data(){
        return{

        }
    },
    mounted(){
    this.animate()
    },
    methods:{        
      animate(){
       var red = this.$anime({
          targets:'.loader',
          loop: true,
          autoplay:true,
          // duration:5000,
          direction:'alternate',
          easing: 'easeInOutQuad',
          // translateX:{
          //   value:20,
          //   duration:2000
          // },
          // scale:{
          //   value:1.2,
          //   duration:1000
          // },
          // translateY:{
          //   value:3
          // }
          translateX:[
            {value:10,duration:1000},
            {value:20,duration:1000},
          ],
            scale:[
            {value:1.7,duration:1000},
            {value:1,duration:1000},
          ],
          translateZ:[
            {value:200,duration:1000},
          ],
          rotate:[
            {value:360,duration:5000}
          ],
          loop:true,
        })
      }
    }

}
</script>
