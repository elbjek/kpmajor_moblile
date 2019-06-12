<template>
   <div class="container">
     <transition name="page" mode="out-in">
     <router-view></router-view>
     </transition>
   </div>
</template>

<script>

    export default {
      components:{

      },
      data() {
     return {
     };
   },
   methods: {
     beforeLeave(element) {
       this.prevHeight = getComputedStyle(element).height;
    }
   }
  }
</script>

<style scoped>
.page-enter-active{
  transition:all 0.09s ease-in-out 0.02s;
}
.page-leave-active {
  transition:  all 0.1s ease-in-out 0.02s;
}
.page-enter,.page-leave-to{
  opacity:0;
}
.page-enter {
  transform: translateX(40%);
}
.page-leave-to{
  transform:translateX(-40%)
}
</style>