<template>
   <div class="login-form-wrap">
     <h2>Prijavi se</h2>
     <form action="post" class="form" @submit.prevent="login">
       <div class="form-item">
        <label for="email">Email</label>
        <input id="email" type="email" v-model="fields.email" placeholder="Email" class="input-form" name="email" value="email" required autocomplete="email"  autofocus>
        <span class="bottom-border"></span>
       </div>
        <div class="form-item">
          <label for="email">Password</label>
          <input id="password" type="password" v-model="fields.password" placeholder="Password" class="input-form" name="password" value="password" required autocomplete="password"  autofocus>
          <span class="bottom-border"></span>       
       </div>
       <div class="submit">
          <router-link  to='/home' class="button">
              Prijavi se
          </router-link>
          <router-link class="additional-btn" to="/register">Registruj se</router-link>
       </div>
     </form>
   </div>
</template>

<script>
import latestproducts from '../products/LatestProducts';
import productslist from '../products/ProductsList';
import search from '../shared/Search'
import messages from '../messages/Messages'
  export default {
    components: {
      'latestproducts':latestproducts,
      'productslist':productslist,
      'search':search,
      'messages':messages
    },
    data(){
      return{
        errorMessage:'Wrong e-mail or password!',
        email:'',
        password:'',
        fields:{}
      }
    },
    methods:{
      login(){
        axios.post('/login',this.fields)
        .then(this.$router.push('/home'))
      }
    }
  }
</script>
