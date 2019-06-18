<template>
    <div class="container">
        <div class="row justify-content-center">
   <div class="products">
       <h2>Add new Appointment</h2>
        <form @submit.prevent="formSubmit()" method="POST" action="/api/products" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" v-model="title"/>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" v-model="description"/>
        </div>
                <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" v-model="price"/>
        </div>
        <!-- <div class="form-group">
            <label for="client_id">Client id</label>
            <select type="number" class="form-control" name="client_id" v-model="fields.client_id">
            <option v-for="(value,key) in clients" :key="key" :value="key"> {{value}}</option>
            </select> 
        </div> -->
         <div class="form-group">
                <div >
                    <img :src="image" class="img-responsive">
                </div>
                <div>
                    <input type="file" v-on:change="onFileChange" class="form-control">
                </div>
        </div>

        <div class="form-group">
            <!-- <label for="user_id">User Id</label> -->
            <input type="hidden"  class="form-control"  name="user_id" :value="userid" />
        </div>
        <a class="btn btn-primary" @click="formSubmit" href="#" >Add</a>
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
                userid:'',
                image:'',
                title:'',
                description:'',
                price:'',
                fields:{},
                errors:{},
                image: '',
            }
        },
        mounted() {
            this.fetchData();
        },
        methods:{
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            fetchData:function () {
                axios.get('/api/products/create')
                    .then(response => {
                        this.userid = response.data.user;
                        console.log(this.userid)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            formSubmit() {
                this.fields = {'image':this.image,'title':this.title,'description':this.description,'price':this.price,'user_id':this.userid}
                console.log(this.fields)
                axios.post('/api/products/', this.fields, {image:this.image})
                .catch(error => {
                    if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                    }
                });
            }
        }
}
</script>

<style  scoped>
    img{
        max-height:36px
    }
</style>
