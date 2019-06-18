<template>
    <div class="user-products-list-wrap">
      <div class="user-products" v-for="product in products" :key="product.id">
        <div class="product-item" >
              <div class="product-heading">
                      <div class="img">
                      <img :src="'/storage/products/'+product.image">
                      </div>
                      <div class="product-content">
                          <h6>{{product.title}}</h6>
                          <p>{{product.city}}</p>
                          <p>{{product.price}} RSD</p>
                      </div>
              </div>
              <div class="star">
                  &#9734;
              </div>           
          </div>
      </div>
    </div>
</template>

<script>

export default {
props:['products'],
  data() {
      return {
          'user': [],
          'currentUrl': window.location.pathname,
          toggle:'fa-toggle-on',
          show:false,
          hide:true,
          // products:''
      }
  },
  mounted() {
      console.log(this.products)
  },
  }
</script>
