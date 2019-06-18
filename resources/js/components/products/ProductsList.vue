<template>
    <div class="products-list-wrap">
        <h2>Svi oglasi</h2>
        <div v-if="products.length === 0">Loading...</div>
        <v-touch v-on:swipeleft.prevent="showOptions(product,$event)" v-on:swiperight.prevent="hideOptions(product,$event)" ref="target" v-for="product in products" :test="product.id" :key="product.id" >
            <router-link :to="'/products/'+product.id" class="product">
                <div class="product-item" >
                    <div class="product-heading">
                            <div class="img">
                            <img :src="'/storage/products/'+product.image">
                            </div>
                            <div class="product-content">
                                <h6>{{product.title}}</h6>
                                <p>{{product.city}}</p>
                                <p>{{product.price}} RSD</p>
                            </div>
                    </div>
                    <div class="star">
                        &#9734;
                    </div>           
                </div>
             <options></options>
            </router-link>
        </v-touch>
    </div>
</template>

<script>
import options from './ProductOptions';
    export default {
        components:{
            options:options
        },
        data() {
            return {
                'products': [],
                'singleproduct':'',
                show:false,
                selected:'',
                product_id:[]
            }
        },
        mounted() {
            this.fetchData()  
        },
        methods:{
            fetchData(){
                axios.get('/api/products')
                .then(response => {
                    this.products = response.data,
                    this.products.forEach(id => {
                        this.product_id.push(id.id)
                    });
                })
            },
            showOptions(product,event){
                console.log(event)
                this.product_id.forEach(el => {
                    if(product.id == el){
                        $(event.target.nextElementSibling).addClass("visible");
                        $(event.target.nextElementSibling.childNodes).addClass("visible");
                        this.$anime({
                            targets:event.target.nextElementSibling,
                            // scaleX:1,
                            translateX:0,
                            easing: 'easeInSine',
                            width:'30%',
                            duration:300
                        })
                        this.$anime({
                            targets:'.call',
                            translateX:0,
                            duration:300
                        })
                        this.$anime({
                            targets:'.message',
                            translateX:0,
                            duration:300
                        })
                        this.$anime({
                            targets:event.target,
                            translateX:-20,
                            easing: 'easeInSine',
                            duration:300
                        })
                    }
                });
            },
            hideOptions(product,event){
                this.product_id.forEach(el => {
                    if(product.id == el){
                        this.$anime({
                            targets:event.target.nextElementSibling,
                            translateX:"50px",
                            easing: 'easeOutSine',
                            width:'0',
                            duration:300
                        })
                        this.$anime({
                            targets:event.target,
                            translateX:0,
                            easing: 'easeOutSine',
                            duration:300
                        })
                        this.$anime({
                            targets:'.call',
                            translateX:13,
                            duration:300
                        })
                        this.$anime({
                            targets:'.message',
                            translateX:-11,
                            duration:300
                        })
                    }
                });                
            }
        }
    }
</script>
