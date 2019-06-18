<template>
   <div class="login-form-wrap">
     <h2>Registracija</h2>
     <form method="post" class="form" @submit.prevent="register">

       <div class="form-item">
          <label for="name">Ime</label>
          <input id="name" type="name" v-model="fields.name" placeholder="Ime" class="input-form" name="name" value="name" required>
          <span class="bottom-border"></span>
          <span class="error">{{errors.name}}</span>
       </div>
        <div class="form-item">
          <label for="lastname">Prezime</label>
          <input id="lastname" type="lastname" v-model="fields.lastname" placeholder="Prezime" class="input-form" name="lastname" value="lastname" required >
          <span class="bottom-border"></span>
          <span class="error">{{errors.lastname}}</span>
       </div>

        <div class="form-item">
          <label for="phone_number">Broj telefona</label>
          <input id="phone_number" type="number" v-model="fields.phone_number" placeholder="Broj telefona" class="input-form" name="phone_number" value="phone_number" required >
          <span class="bottom-border"></span>
          <span class="error">{{errors.phone_number}}</span>
       </div>

        <div class="form-item">
          <label for="phone_number">Grad/Mesto</label>
          <input id="city" type="text" v-model="fields.city" placeholder="Grad/Mesto" class="input-form" name="city" value="city" required >
          <span class="bottom-border"></span>
          <span class="error">{{errors.city}}</span>
       </div>

       <div class="form-item">
          <label for="email">Email</label>
          <input id="email" type="email" v-model="fields.email" placeholder="Email" class="input-form" name="email" value="email" required >
          <span class="bottom-border"></span>
          <span class="error">{{errors.email}}</span>
       </div>

        <div class="form-item">
          <label for="email">Password</label>
          <input id="password" type="password" v-model="fields.password" placeholder="Password" class="input-form" name="password" value="password" required >
          <span class="bottom-border"></span>     
          <span class="error">{{errors.password}}</span>
       </div>

      <div class="form-item">
          <label for="password_confirmation">Ponovi šifru</label>
          <input id="password_confirmation" type="password" v-model="fields.password_confirmation" placeholder="Ponovi šifru" class="input-form" name="password_confirmation" value="password_confirmation" required >
          <span class="bottom-border"></span>    
          <span class="error">{{errors.password}}</span>
       </div>

       <div class="submit">
          <button href='' type="submit" class="button">
              Registruj se
          </button>
          <router-link class="additional-btn" to="/login"> Prijavi se</router-link>
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
        name:'',
        lastname:'',
        phone_number:'',
        city:'',
        fields:{},
        errors:{}
      }
    },
    methods:{
      register(){
        axios.post('/register',this.fields)
        .then(this.$router.push('/login'))
        .catch(error => {
          if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
        })
      }
    }
  }
</script>
