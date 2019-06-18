<template>
    <div class="user-profile-wrap">
       <div class="user-profile-header">
           <div class="img">
               <img src="https://pixel.nymag.com/imgs/daily/science/2016/06/10/10-cute-baby.w700.h700.jpg" alt="">
           </div>
           <h5>{{user.name}} {{user.lastname}}</h5>
           <p>{{formatTime}}</p>
       </div>
       <router-link to="/products/edit">Edit</router-link>
       <div class="user-info">
           <label for="email">
               E-mail
               <p>{{user.email}}</p>
           </label>
            <label for="city">
                Mesto/Grad
               <p>{{user.city}}</p>
           </label>
            <label for="phone_number">
                Broj telefona
               <p>{{user.phone_number}}</p>
           </label>           
       </div>
       <div class="settings">
           <div class="setting-item">
                <p>Da li želite da se ovi lični podaci ubace i u već postavljene oglase?</p>
                <div class="switch">
                    <i class="fas fa-toggle-on" v-show="show" @click="reverseToggle"></i>
                    <i class="fas fa-toggle-off" v-show="hide" @click="showToggle"></i>
                </div>
           </div>
            <div class="setting-item">
                <p>Da li želite da ostali korisnici vide kada ste online?</p>
                <div class="switch">
                    <i class="fas fa-toggle-on" v-show="show" @click="reverseToggle"></i>
                    <i class="fas fa-toggle-off" v-show="hide" @click="showToggle"></i>
                </div>
           </div>
            <div class="setting-item">
                <p>Da li želite da link "Svi oglasi" bude vidljiv u svakom vašem oglasu?</p>
                <div class="switch">
                    <i class="fas fa-toggle-on" v-show="show" @click="reverseToggle"></i>
                    <i class="fas fa-toggle-off" v-show="hide" @click="showToggle"></i>
                </div>
           </div>  
       </div>
           <user-products-list :products="products" :ids="ids"></user-products-list>         
    </div>
</template>

<script>
import UserProduct from './UserProducts';
    export default {
        components:{
            'user-products-list':UserProduct
        },
        data() {
            return {
                'user': [],
                'currentUrl': window.location.pathname,
                toggle:'fa-toggle-on',
                show:false,
                hide:true,
                products:'',
                ids:[]
            }
        },
        mounted() {
            this.fetchUser()
        },
        methods:{
            fetchUser(){
                axios.get('/api'+ this.currentUrl)
                .then(response => {
                    this.user = response.data[0]
                    this.products = this.user.products,
                    this.products.forEach(id => {
                        this.ids.push(id.id)
                    });
                })
            },
            showToggle(){
                    // this.show ? this.show=false : this.show=true
                if(this.show=true){
                    this.hide=false;
                    this.show=true;
                }
            },
            reverseToggle(){
                if(this.show=true){
                this.hide=true;
                this.show=false
                }
            }
        },
        computed:{
            formatTime(){
                var moment = require('moment');
                var time = this.user.created_at;
               return moment(time).format("DD MMM YYYY");
            },

        }
    }
</script>
