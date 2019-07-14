<template>
  <div class="user-profile-wrap">
    <div class="user-profile-header">
      <div class="img">
        <img v-if="user.profile_picture" :src="'/storage/user_images/'+user.profile_picture" alt />
        <img
          v-else
          src="https://pixel.nymag.com/imgs/daily/science/2016/06/10/10-cute-baby.w700.h700.jpg"
          alt
        />
      </div>
    <div class="user-heading">
     <h5>{{user.name}} {{user.lastname}}</h5>
      <p>{{formatTime}}</p>
    </div>
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
      <div class="setting-item" v-for="question in questions" :key="question.id">
        <p>{{question}}</p>
        <div class="switch">
          <i class="fas fa-toggle-off" v-on:click="toggleQuestion($event)"></i>
        </div>
      </div>
    </div>
    <user-products-list :products="products" :ids="ids"></user-products-list>
  </div>
</template>

<script>
import UserProduct from "./UserProducts";
export default {
  components: {
    "user-products-list": UserProduct
  },
  data() {
    return {
      user: [],
      currentUrl: window.location.pathname,
      toggle: "fa-toggle-on",
      show: false,
      hide: true,
      products: "",
      ids: [],
      questions: {
        [0]: "Da li želite da se ovi lični podaci ubace i u već postavljene oglase?",
        [1]: "Da li želite da ostali korisnici vide kada ste online?",
        [2]: 'Da li želite da link "Svi oglasi" bude vidljiv u svakom vašem oglasu?',
        [3]: "Da li želite da se ovi lični podaci ubace i u već postavljene oglase?"
      }
    };
  },
  mounted() {
    this.fetchUser();
    window.onscroll = this.scrollImage;
  },
  methods: {
    fetchUser() {
      axios.get("/api" + this.currentUrl).then(response => {
        this.user = response.data[0];
        (this.products = this.user.products),
          this.products.forEach(id => {
            this.ids.push(id.id);
          });
      });
    },
    toggleQuestion(event) {
      $(event.target).toggleClass("fa-toggle-on fa-toggle-off");
    },
    scrollImage() {
      if (document.body.scrollTop > 37 || document.documentElement.scrollTop > 37) {
          $('.user-profile-header .img').addClass('user-header-position')
        //   this.$anime({
        //       targets:'.user-profile-header .img',
        //       scale:0.8,
        //       easing:'linear',
        //       duration:1000
        //   })
          this.$anime({
              targets:'.user-profile-header',
              opacity:1,
              'visibility':'visible'
          })
      } else {
      }
    }
  },
  computed: {
    formatTime() {
      var moment = require("moment");
      var time = this.user.created_at;
      return moment(time).format("DD MMM YYYY");
    }
  }
};
</script>
