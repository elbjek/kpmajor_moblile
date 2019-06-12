<template>
   <div>
     <search></search>
     <latestproducts></latestproducts>
     <productslist></productslist>
     <messages></messages>
   </div>
</template>

<script>
import latestproducts from '../products/LatestProducts';
import productslist from '../products/ProductsList';
import search from '../shared/Search'
import messages from '../messages/Messages'
  export default {
    components: {
      'latestproducts':latestproducts,
      'productslist':productslist,
      'search':search,
      'messages':messages
    },
  }
</script>

<style scoped>
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>