<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">  
                <p>Naziv:{{product.title}}</p>
                <p>Opis{{product.description}}</p>
                <p>Cena:{{product.price}}RSD</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
            <h4>User info:</h4>
            <p>Ime{{product.name}}</p>
            <p>Prezime:{{product.lastname}}</p>
            <p>Phone number:{{product.phone_number}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'product': [],
                'currentUrl': window.location.pathname
            }
        },
        mounted() {
            this.fetchProducts()
        },
        methods:{
            fetchProducts(){
                axios.get('/api'+ this.currentUrl)
                .then(response => {
                    this.product = response.data[0]
                    console.log(this.product)
                })
            }
            
        }
    }
</script>
