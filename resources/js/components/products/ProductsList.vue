<template>
  <div class="products-list-wrap">
    <h2>Svi oglasi</h2>
    <v-touch
      v-on:swipeleft="showOptions(product,$event)"
      v-on:swiperight.prevent="hideOptions(product,$event)"
      ref="target"
      v-for="product in products"
      :key="product.id"
    >
      <div class="productitem">
        <productitem :product="product"></productitem>
      </div>
    </v-touch>
    <infinite-loading
      @infinite="infiniteHandler"
      no-more="ucitali ste"
      :forceUseInfiniteWrapper="true"
    >
      <template slot="no-more">Ucitali ste sve podatke</template>
    </infinite-loading>
  </div>
</template>

<script>
import options from "./ProductOptions";
import product from "../shared/product";
import InfiniteLoading from "vue-infinite-loading";
export default {
  components: {
    options: options,
    // productitem: () => import("../shared/product"),
    productitem: product,
    InfiniteLoading
  },
  data() {
    return {
      products: [],
      singleproduct: "",
      show: false,
      selected: "",
      product_id: [],
      page: 1,
      list: [],
      busy: false
    };
  },
  created() {
    this.loading = 0;
  },
  beforeMount() {
    // this.fetchData();
  },
  methods: {
    infiniteHandler($state) {
      axios.get("/api/products?page=" + this.page).then(response => {
        setTimeout(() => {
          if (response.data.data.length) {
            this.page += 1;
            let array = response.data.data;
            array.forEach(element => {
              this.products.push(element);
              this.products.forEach(item => {
                this.product_id.push(item.id);
              });
            });
            $state.loaded();
          } else {
            $state.complete();
          }
        }, 200);
      });
    },
    showOptions(product, event) {
      // console.log(event)
      this.product_id.forEach(el => {
        if (product.id == el) {
          $(event.target.nextElementSibling).addClass("visible");
          this.$anime({
            targets: event.target.nextElementSibling,
            translateX: 0,
            width: "35%",
            easing: "linear",
            duration: 200
          });
          this.$anime({
            targets: event.target,
            translateX: -20,
            easing: "linear",
            duration: 200
          });
        }
      });
    },
    hideOptions(product, event) {
      this.product_id.forEach(el => {
        if (product.id == el) {
          this.$anime({
            targets: event.target.nextElementSibling,
            translateX: "50px",
            easing: "easeOutSine",
            width: "0",
            duration: 150
          });
          this.$anime({
            targets: event.target,
            translateX: 0,
            easing: "easeOutSine",
            duration: 150
          });
          // this.$anime({
          //   targets: ".call",
          //   translateX: 13,
          //   duration: 150
          // });
          // this.$anime({
          //   targets: ".message",
          //   translateX: -11,
          //   duration: 150
          // });
        }
      });
    }
  }
};
</script>

