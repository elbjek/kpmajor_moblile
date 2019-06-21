<template>
  <div class="swipe-options-wrap">
    <div class="edit option">
      <router-link :to="'/products/'+id+'/edit'">
        <i class="far fa-edit"></i>
      </router-link>
    </div>
    <div class="delete option">
      <button @click.prevent="deleteItem">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
</template>

<script>
import {EventBus} from '../../app';

export default {
  data() {
    return {
      products: [],
      singleproduct: ""
    };
  },
  props: ["id"],
  methods: {
    alertme() {
      prompt("Are you sure?");
    },
    deleteItem($id) {
      axios.delete("/api/products/" + this.id).then(response => {
        EventBus.$emit('clickedItemId',this.id)
      });
    }
  }
};
</script>
