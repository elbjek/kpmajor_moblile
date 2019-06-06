<template>
<div class="search-component">
    <div class="alert alert-danger" role="alert" v-if="error">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    @{{ error }}
</div>
        <div class="form-group">
        <div class="search-bar">
            <div class="">
                <input type="text" placeholder="Pretraga"  v-model="query">
            </div>
            <span class="">
            <button class="btn " type="button" @click="search()" v-if="!loading">Search!</button>
                <button class="btn" type="button" disabled="disabled" v-if="loading">Searching...</button>
            </span>
        </div>
    </div>
        <div id="products" class="row list-group">
        <div class="item col-xs-4 col-lg-4" v-for="product in products" :key="product.id">
            <div class="thumbnail">
                <!-- <img class="group list-group-image" :src="product.image" alt="{{ product.title }}" /> -->
            <div class="caption">
                <h4 class="group inner list-group-item-heading">{{ product.title }}</h4>
                <p class="group inner list-group-item-text">{{ product.description }}</p>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                            <p class="lead">{{ product.price }}</p>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <a class="btn btn-success" href="#">Add to cart</a>
                    </div>
                </div>
            </div>
    </div>
</div>
        </div>
</div>
</template>

<script>
export default {  
    data(){
        return{
                products: [],
                loading: false,
                error: false,
                query: ''
        }
    },
    methods:{
 search: function() {
        // Clear the error message.
        // this.error = '';
        // // Empty the products array so we can fill it with the new products.
        // this.products = [];
        // // Set the loading property to true, this will display the "Searching..." button.
        // this.loading = true;

        // Making a get request to our API and passing the query to it.
        axios.get('/api/products/search?q=' + this.query).then((response) => {
            // If there was an error set the error message, if not fill the products array.
            response.body.error ? this.error = response.body.error : this.products = response.body;
            // The request is finished, change the loading to false again.
            this.loading = false;
            // Clear the query.
            this.query = '';
        });
    }                  
    }

}
</script>
