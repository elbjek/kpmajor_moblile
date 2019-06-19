<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="products">
        <h2>EDIT</h2>
        <form
          @submit.prevent="formSubmit()"
          method="POST"
          action="/api/products"
          enctype="multipart/form-data"
        >
          <div class="form-group">
            <label for="title">Title</label>
            <input
              id="title"
              type="text"
              v-model="title"
              placeholder="title"
              class="form-control"
              name="fields.title"
              required
            >
            <span class="bottom-border"></span>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input
              type="text"
              class="form-control"
              name="description"
              placeholder
              v-model="description"
              required
            >
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" v-model="price">
          </div>
          <div class="detail-container">
            <label>Image:</label>
            <input
              type="file"
              class="form-control-file"
              id="image"
              name="image"
              @change="onFileChange"
            >
            <small
              id="fileHelp"
              class="form-text text-muted"
            >After you select your desired cover, it will show the preview of the photo below.</small>
            <div id="preview" style="overflow:hidden">
              <img
                v-if="image"
                :src="image.name"
                max-height="80"
                max-width="80"
              >
            </div>
          </div>

          <div class="form-group">
            <!-- <label for="user_id">User Id</label> -->
            <input type="hidden" class="form-control" name="user_id" :value="userid">
          </div>
          <a class="btn btn-primary" @click="formSubmit" href="#">Add</a>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "EditProduct",
  data: function() {
    return {
      userid: "",
      image: "",
      title: "",
      description: "",
      price: "",
      fields: {},
      errors: {},
      currentUrl: window.location.pathname,
      product:''
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.image = file;
    },
    fetchData: function() {
      axios
        .get("/api" + this.currentUrl)
        .then(response => {
          this.product = response.data[0];
          console.log(product);
          this.userid = this.product.user_id;
          this.image = this.product.image;
          this.description = this.product.description;
          this.price = this.product.price;
          this.title = this.product.title;
        })
        .catch(err => {
          console.log(err);
        });
    },
    formSubmit() {
      const fd = new FormData();
      fd.append("image", this.image, this.image.name);
      console.log(this.image.name);
      fd.append("title", this.title);
      fd.append("description", this.book_description);
      fd.append("price", this.price);
      fd.append("image", URL.createObjectURL(this.image));
      // this.fields = {'title':this.title,'description':this.description,'price':this.price,'user_id':this.userid,'image':this.image}
      axios.put("/api/products", fd).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    }
  }
};
</script>

<style  scoped>
/* img {
  max-height: 36px;
} */
</style>
