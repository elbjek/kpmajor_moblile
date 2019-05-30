<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="product in products" :key="product.id">
                    <div class="card-header">{{product.title}}</div>

                    <div class="card-body">
                        <p>{{product.name}} {{product.lastname}}</p>
                        <p>{{product.title}}</p>
                        <p>{{product.description}}</p>
                        <p>{{product.price}}RSD</p>
                    <a :href="'/products/' + product.id">View product</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'products': []   
            }
        },
        mounted() {
            this.fetchData()
           

        },
        methods:{
            fetchData(){
                axios.get('/api/products')
                .then(response => {
                    this.products = response.data
                    console.log(this.products)
                })
            }
        }
    }
</script>
