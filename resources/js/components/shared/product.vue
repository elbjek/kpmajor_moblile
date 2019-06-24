<template>
  <router-link :to="'/products/'+product.id" class="product">
    <div class="product-item">
      <div class="product-heading">
        <div class="img">
          <img :src="'/storage/products/'+product.image">
        </div>
        <div class="product-content">
          <h6>{{product.title}}</h6>
          <p><i class="fas fa-map-marker-alt" ></i>{{product.user.city}}</p>
          <p>{{product.price}} RSD</p>
        </div>
      </div>
      <div class="star">&#9734;</div>
    </div>
    <options></options>
  </router-link>
</template>
<script>
import options from "../products/ProductOptions";
export default {
	props: ["product"],
  components: {
    options: options,
    // product: product
  },
};
</script>