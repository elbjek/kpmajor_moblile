<template>
  <nav class="navigation navbar navbar-expand-md navbar-light" id="nav3">
    <div class="container">
      <logo-component></logo-component>
      <button class="nav-button" id="nav" type="button" v-on:click="toggleNav">
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <v-touch
      class="navigation-test"
      id="navtest"
      v-on:swipeleft="showNavigation"
      v-on:tap="hideNavigation"
      v-on:swiperight="hideNavigation"
    >
      <div class="navigation2">
        <div class="user-wrap">
          <div class="nav-header-wrap">
            <h3>Informacije:</h3>
            <button class="nav-button">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="user-profile-header" v-if="user">
            <div class="img">
              <img
                v-if="user.profile_picture"
                :src="'/storage/user_images/'+user.profile_picture"
                alt
              >
              <img
                v-else
                src="https://pixel.nymag.com/imgs/daily/science/2016/06/10/10-cute-baby.w700.h700.jpg"
                alt
              >
            </div>
            <div>
              <h5>{{user.name}} {{user.lastname}}</h5>
              <p>{{formatTime}}</p>
              <div class="products">
                <p>
                  <span>{{numberOfProducts}}</span>Oglasa
                </p>
                <p>
                  <span>{{numberOfMessages}}</span>Poruka
                </p>
              </div>
            </div>
          </div>
        </div>
        <ul v-if="user" class="nav-list">
          <li class="navigation-item">
            <router-link to="/users/1">
              <i class="far fa-user"></i>
              <span>Profile</span>
            </router-link>
          </li>
          <li class="navigation-item">
            <router-link class to="/products/create">
              <i class="far fa-sticky-note"></i>
              <span>Postavi oglas</span>
            </router-link>
          </li>
          <li class="navigation-item logout">
            <a
              href="#"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >Odjavi se</a>
            <form id="logout-form" action="logout" method="POST" style="display: none;">
              <input type="hidden" name="_token" :value="csrf">
            </form>
          </li>
        </ul>

        <ul v-if="!user">
          <li class="navigation-item" v-on:swipeleft="showNavigation">
            <router-link to="/login">
              <i class="fas fa-sign-in-alt"></i>
              <span>Prijavi se</span>
            </router-link>
          </li>
          <li class="navigation-item" v-on:swipeleft="showNavigation">
            <router-link to="/register">
              <i class="far fa-list-alt"></i>
              <span>Registruj se</span>
            </router-link>
          </li>
        </ul>
      </div>
    </v-touch>
  </nav>
</template>

<script>
import { setTimeout } from "timers";
import logo from "./shared/logo";
import { EventBus } from "../app";
export default {
  components: {
    "logo-component": logo
  },
  data() {
    return {
      show: false,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      // user: "",
      products: ""
    };
  },
  props: ["user"],
  mounted() {
    EventBus.$on("closeNav", this.hideNavigation());
    axios.get("/api/users/" + this.user.id).then(response => {
      (this.products = response.data), console.log(response);
    });
  },
  methods: {
    submit: function() {
      this.$refs.form.submit();
    },
    toggleNav() {
      this.showNavigation();
    },
    showNavigation() {
      $("body").addClass("overflow");
      $(".search-bar").css({ "z-index": 0, position: "static" });
      var el = $(".navigation-test").width() - 50;
      this.$anime({
        targets: ".navigation-test",
        translateX: 0,
        duration: 200,
        scaleX: "1",
        easing: "cubicBezier(0.470, 0.000, 0.745, 0.715)",
        keyframes: [{ backgroundColor: "rgba(0,0,0,0.2)", delay: 100 }]
      });
      this.show = true;
    },
    hideNavigation() {
      $("body").removeClass("overflow");
      setTimeout(() => {
        $(".search-bar").css({ "z-index": 11, position: "relative" });
      }, 300);
      this.$anime({
        targets: ".navigation-test",
        scaleX: "0.2",
        easing: "cubicBezier(0.390, 0.575, 0.565, 1.000)",
        duration: 150,
        translateX: 320,
        keyframes: [{ backgroundColor: "rgba(0,0,0,0)", delay: 10 }]
      });
      // this.$anime({
      //   targets:'.navigation2',
      //   translateX:'200px',
      //   // duration:
      // })
    }
  },
  computed: {
    formatTime() {
      var moment = require("moment");
      var time = this.user.created_at;
      return moment(time).format("DD MMM YYYY");
    },
    numberOfProducts() {
      var products = this.products;
      for (var i = 0; i < products.length; i++) {
        return products[i].products.length;
      }
    },
    numberOfMessages() {
      var products = this.products;
      for (var i = 0; i < products.length; i++) {
        return products[i].messages.length;
      }
    }
  }
};
</script>

<style lang="scss"  scoped>
.navigation-test {
  min-height: 100vh;
  width: 100%;
  position: fixed;
  background: transparent;
  right: 0;
  width: 100%;
  z-index: 7;
  top: 0;
  transform-origin: bottom right;
}
.navigation2 {
  touch-action: auto;
  user-select: none;
  -webkit-user-drag: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  width: 75%;
  background-color: #ffffff;
  justify-self: right;
  position: relative;
  right: 0;
  top: 0px;
  height: 100%;
  position: absolute;
  right: 0;
  transform-origin: bottom right;
}

ul {
  margin: 0;
  padding: 0.5em 0em 0em 0em;
  border-top: 1px solid #f4f4f4;
  li {
    list-style-type: none;
    padding: 0.8em 1.5em;
    a {
      color: #003368;
      i {
        margin-right: 6px;
      }
    }
  }
}
.nav-header-wrap {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #f4f4f4;
    h3 {
    color: #003368;
    font-size: 16px;
    font-weight: bold;
    margin: 0;
    padding-left: 1.5em;
  }
}
.user-profile-header {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
  padding: 0.8em 1.5em;
  .img {
    height: 40px;
    width: 40px;
  }
  h5,
  p {
    padding: 0;
    color: #003368;
    margin: 0;
  }
  h5 {
    margin-top: 10px;
  }
  p {
    font-size: 13px;
    margin-top: 6px;
  }

  .products {
    display: flex;
    p {
      margin-right: 12px;
    }
    span {
      font-weight: 900;
      margin-right: 4px;
    }
  }

  .logout {
    border-top: 1px solid #f4f4f4;
  }
}
</style>