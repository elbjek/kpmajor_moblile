<template>
  <div>
    <div class="container">
      <transition name="page" mode="out-in">
        <router-view></router-view>
      </transition>
      <navigation :user="user"></navigation>
    </div>
  </div>
</template>

<script>
import navigation from "../Navigation";
import footer from "../shared/footer";
export default {
  components: {
    navigation: navigation,
    "footer-component": footer
  },
  data() {
    return {
      user:''
    };
  },
  mounted(){
      axios.get('/api/user')
      .then(response=>{
          this.user = response.data
      })
  },
  methods: {
    beforeLeave(element) {
      this.prevHeight = getComputedStyle(element).height;
    }
    //   showNav(event){
    //   // var x = document.getElementById("x");
    //   // var y = document.getElementById("y");
    //   // var target = document.getElementById('navtest')
    //   // // console.log({event:event},{target:target})
    //   //           x.innerHTML = event.deltaX;
    //   //           y.innerHTML = event.deltaY;
    //   //         $('#navtest').css({'left': event.center.x},{scaleX:1.5});

    //   //           // $('#navtest').css('top', event.center.y);
    //   console.log('hi')
    //  var test = $(window).width() + (-event.deltaX);
    //   $('.py-4').css('left',event.deltaX);
    //   // $('.test').addClass('test2');
    //   // if(event.deltaX >= -210 ){
    //   //   //  this.$refs.pan.disable('pan')
    //   // console.log(event.deltaX)
    //   // }
    // }
  }
};
</script>

<style scoped>
.page-enter-active {
  transition: all 0.09s ease-in-out 0.02s;
}
.page-leave-active {
  transition: all 0.1s ease-in-out 0.02s;
}
.page-enter,
.page-leave-to {
  opacity: 0;
}
.page-enter {
  transform: translateX(40%);
}
.page-leave-to {
  transform: translateX(-40%);
}
</style>