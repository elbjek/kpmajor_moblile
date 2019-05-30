<template>
    <div class="container">
        <div class="row justify-content-center">
   <div class="appointments">
       <h2>Add new Appointment</h2>
        <form @submit.prevent="formSubmit()" method="POST" action="/api/appointments">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" v-model="fields.title"/>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" v-model="fields.description"/>
        </div>
                <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" v-model="fields.price"/>
        </div>

        <!-- <div class="form-group">
            <label for="client_id">Client id</label>
            <select type="number" class="form-control" name="client_id" v-model="fields.client_id">
            <option v-for="(value,key) in clients" :key="key" :value="key"> {{value}}</option>
            </select> 
        </div> -->
        <div class="form-group">
            <!-- <label for="user_id">User Id</label> -->
            <input type="hidden"  class="form-control"  name="user_id" :value="userid"/>
        </div>
        <a class="btn btn-primary" @click="formSubmit" href="/home" >Add</a>
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
                fields:{},
                errors:{}
            }
        },
        mounted() {
            this.fetchData();
        },
        methods:{
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
                axios.post('/api/products/', this.fields)
                .catch(error => {
                    if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                    }
                });
            }
        }
}
</script>
