<template>
  <div class="navigation-test" id="navtest" >
    <v-touch
      class="navigation2"
      v-on:swipeleft.prevent="showNavigation($event)"
      v-on:swiperight.prevent="hideNavigation()"
    >
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
            class
            href="/logout"
            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
          >
            <i class="fas fa-sign-out-alt"></i>
            <span>Odjavi se</span>
          </a>
          <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>
        </li>
      </ul>

      <ul v-if="!user">
        <li class="navigation-item">
          <router-link to="/login">
            <i class="fas fa-sign-in-alt"></i>
            <span>Prijavi se</span>
          </router-link>
        </li>
        <li class="navigation-item">
          <router-link to="/register">
            <i class="far fa-list-alt"></i>
            <span>Registruj se</span>
          </router-link>
        </li>
      </ul>
    </v-touch>
  </div>
</template>

<script>
import { setTimeout } from 'timers';
export default {
    data(){
        return{
            show:false
        }
    },
  props: ["user"],
  mounted() {
    var el = $(".navigation2").width() - 20;
    $(".navigation2").css({ transform: "translate(" + el + "px)" });
  },
  methods: {
    showNavigation() {
      var el = $(".navigation2").width() - 20;
      console.log(el);
      $('.navigation2').addClass('navigation-style');
      $('.navigation-test').addClass('navigation-close');

      this.$anime({
        targets: ".navigation2",
        translateX: -el,
        easing: "linear",
        duration:300
      });
    },
    hideNavigation() {
      this.$anime({
        targets: ".navigation2",
        translateX: 0,
        easing: "linear",
        duration:300
      });
      setTimeout(()=>{
        $('.navigation2').removeClass('navigation-style');
        $('.navigation-test').removeClass('navigation-close');
      },300)
    }
  }
};
</script>

<style scoped>
.navigation-test {
  width: 100%;
  height: 100%;
  background: transparent;
  position: fixed;
  top: 37px;
  left: 0;
  z-index:1000;
}
.navigation2 {
  position: absolute;
  top: 0;
  right: 0;
  background-color: transparent;
  height: 100%;
  width: 60%;
}
ul{
    margin:0;
    padding:0;
}
ul li {
    list-style-type: none;
    padding:16px;
}
ul li a {
    color:white;
}
ul li a i{
    margin-right:6px;
}

.navigation-style{
    background-color: #003368 !important;
}
.navigation-close{
    background-color: rgba(0,0,0,0.3) !important;
      /* pointer-events: none;
    touch-action: none;
    user-select: none;
    -webkit-user-drag: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0); */
}
</style>