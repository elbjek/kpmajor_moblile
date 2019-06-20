<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="products">
        <h2>Add new Appointment</h2>
        <form
          @submit.prevent="formSubmit()"
          method="PUT"
          action="/api/products"
          enctype="multipart/form-data"
        >
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" v-model="title">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" v-model="description">
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" v-model="price">
          </div>

          <div class="detail-container">
            <label>Book Cover:</label>
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
            <div id="preview">
              <img v-if="image" :src="image.name" height="281" width="180">
            </div>
          </div>

          <div class="form-group">
            <!-- <label for="user_id">User Id</label> -->
            <input type="hidden" class="form-control" name="user_id" :value="userid">
          </div>
          <a class="btn btn-primary"  href="#">Add</a>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreateProduct",
  data: function() {
    return {
      userid: "",
      image: "",
      title: "",
      description: "",
      price: "",
      fields: {},
      errors: {},
      image: "",
      product:'',
      'currentUrl': window.location.pathname
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.image = file;
    //   console.log(this.image)
    },
    fetchData: function() {
      axios
        .get("/api"+this.currentUrl)
        .then(response => {
          this.product = response.data[0];
          this.title = response.data[0].title;
        })
        .catch(err => {
          console.log(err);
        });
    },
    formSubmit() {
      const fd = new FormData();
      fd.append("image", this.image, this.image.name);
      console.log(this.image);
      fd.append("title", this.title);
      console.log(this.title)
      fd.append("description", this.book_description);
      fd.append("price", this.price);

      fd.append("image", URL.createObjectURL(this.image));
    //   this.fields = {'title':this.title,'description':this.description,'price':this.price,'user_id':this.userid,'image':URL.createObjectURL(this.image)}
      console.log(fd);
      axios.put("/api/products/"+this.product.id, fd).catch(error => {
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
