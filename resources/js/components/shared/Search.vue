<template>
  <div class="search-component">
    <div class="alert alert-danger" role="alert" v-if="error">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      @{{ error }}
    </div>
    <div class="form-group">
      <div class="search-bar" id="search">
        <div class="col-11 input-wrap">
          <input
            type="text"
            class="input"
            placeholder="Pretraga"
            @click="showFilters"
            v-model="query"
            v-on:keyup="additionalQuery"
          >
        </div>
        <!-- <div class="searchicon" v-show="hide">
                <i class="fas fa-search"></i>
        </div>-->
        <div class="cancel" v-show="show">
          <i @click="removeFilters" v-bind:class="{show:show}" class="fas fa-times"></i>
        </div>
      </div>

      <div class="filters-wrap" v-show="show" v-bind:class="{filtertransition:show}">
        <div class="filter-buttons">
          <label class="checkbox">
            Naslov
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="checkbox">
            Tekst oglasa
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
        <div class="filter">
          <span>Filteri</span>
          <i class="fas fa-sliders-h"></i>
        </div>
      </div>
      <div class="additional-query">
        <div class="search-by">
          <p>
            <span>
              Pretrazi oglase po: "
              <span class="query">{{query}}</span>" na celom
              <span class="logo">
                <span>k</span>
                <span>p</span>
              </span>
            </span>
            <span>
              <i class="fas fa-chevron-right"></i>
            </span>
          </p>
          <p>
            <span>
              Pretrazi oglase po: "
              <span class="query">{{query}}</span>" na celom
              <span class="logo">
                <span>k</span>
                <span>p</span>
              </span>
            </span>
            <span>
              <i class="fas fa-chevron-right"></i>
            </span>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
      loading: false,
      error: false,
      query: "",
      show: false,
      hide: true,
      isVisible: false
    };
  },
  mounted() {
    this.$anime;
  },
  methods: {
    additionalQuery() {
      if (this.query.length == 0) {
        $(".additional-query").removeClass("show-additional-query");
        this.$anime({
          targets: ".additional-query",
          translateY: -20,
          height: "0px",
          easing: "linear",
          duration: 200,
          opacity:0
        });
      } else {
        $(".additional-query").addClass("show-additional-query");
        this.$anime({
          targets: ".additional-query",
          translateY: 5,
          height: "100%",
          easing: "linear",
          opacity:1,
          duration: 200
        });
      }
    },
    removeFilters(e) {
      this.$anime({
        targets: ".cancel",
        translateX: 15,
        keyframes: [
          { translateX: 20, scaleX: 0.9 },
          { translateX: 20, scaleX: 0.8 }
        ],
        easing: "cubicBezier(.5, .05, .1, .3)"
      });
      this.$anime({
        targets: ".additional-query",
        translateY: -20,
        height: "0px",
        easing: "linear",
        duration: 200
      });
      this.show = false;
      this.hide = true;
      $(".input").removeClass("enlarge-search");
      $(".additional-query").removeClass("show-additional-query");
      this.query = "";
    },
    showFilters() {
      $(".input").addClass("enlarge-search");
      this.show = true;
      this.hide = false;
      this.cancel();
    },
    cancel() {
      var animation = this.$anime({
        targets: ".cancel",
        duration: 420,
        keyframes: [
          { translateX: 20, scaleX: 0.9 },
          { translateX: 0, scaleX: 1 }
        ],
        easing: "cubicBezier(.5, .05, .1, .3)"
      });
      animation.play();
    }
  }
};
</script>
