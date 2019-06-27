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
        <ul v-if="user">
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
          <li class="navigation-item">
            <a
              href="#"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >Sign Out</a>
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
import {EventBus} from '../app';
export default {
  components: {
    "logo-component": logo
  },
  data() {
    return {
      show: false,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  },
  props: ["user"],
  mounted() {
    var el = $(".navigation-test").width() - 50;
    $(".navigation-test").css({ transform: "translateX(" + el + "px)" });
    EventBus.$on('closeNav',this.hideNavigation())
  },
  methods: {
    submit: function() {
      this.$refs.form.submit();
    },
    toggleNav() {
        this.showNavigation()
    },
    showNavigation() {
      $("body").addClass("overflow");
      $('.search-bar').css({'z-index':0,"position":"static"})
      var el = $(".navigation-test").width() - 50;
      this.$anime({
        targets: ".navigation-test",
        translateX: 0,
        duration: 300,
        easing: "linear",
        width: "100%",
      });
      this.show = true;
    },
    hideNavigation() {
      $("body").removeClass("overflow");
      setTimeout(()=>{
      $('.search-bar').css({'z-index':11,"position":"relative"})
      },300)
      var el = $(".navigation-test").width() - 50;
      this.$anime({
        targets: ".navigation-test",
        translateX: el,
        duration: 300,
        easing: "linear",
      });
    }
  }
};
</script>

<style scoped>
.navigation-test {
  min-height: 100vh;
  width: 100%;
  position: fixed;
  background: transparent;
  right: 0;
  width: 100%;
  z-index: 7;
  top:0px
}
.navigation2 {
  touch-action: auto;
  user-select: none;
  -webkit-user-drag: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  width: 60%;
  background-color: #003368;
  justify-self: right;
  position: relative;
  right: 0;
  top:0;
  height: 100%;
  position: absolute;
  right: 0;
  text-align: right;
  padding-right: 20px;
}

ul {
  margin: 0;
  padding: 0;
}
ul li {
  list-style-type: none;
  padding: 16px;
}
ul li a {
  color: white;
}
ul li a i {
  margin-right: 6px;
}
</style>