<template>
    <div class="container" style="height:100vh">
    <div class="row justify-content-center">
   <div class="products-form-wrap">
       <h2>Dodaj proizvod</h2>
        <form   method="POST" action="/api/products" enctype="multipart/form-data">
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
			<div class="detail-container">
				<label>Slika:</label>
				<input type="file" class="form-control-file" id="image" name="image" @change="onFileChange">
				<small id="fileHelp" class="form-text text-muted">After you select your desired cover, it will show the preview of the photo below.</small>
				<div id="preview">
					<img v-if="image" :src="image.name" height="281" width="180" />
				</div>
			</div>
        <div class="form-group">
            <!-- <label for="user_id">User Id</label> -->
            <input type="hidden"  class="form-control"  name="user_id" :value="userid" />
        </div>
        <button class="btn btn-primary" @click="formSubmit()">Dodaj</button>
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
                const file = e.target.files[0];
                this.image = file;
			},
            fetchData:function () {
                axios.get('/api/products/create')
                    .then(response => {
                        this.userid = response.data.user;
                        console.log(response.data)
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            formSubmit() {
                const fd = new FormData();
				fd.append('image', this.image, this.image.name)
                fd.append('title', this.title);
                fd.append('description', this.description);
                fd.append('price', this.price);
                fd.append('user_id', this.userid);
                fd.append('image', URL.createObjectURL(this.image))
                // this.fields = {'title':this.title,'description':this.description,'price':this.price,'user_id':this.userid,'image':this.image}
                axios.post('/api/products', fd)
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
