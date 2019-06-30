<template>
  <div class="messages-wrap" v-if="user">
    <v-touch v-touch:tap="openMessages" class="message-button open-messages">
      <i class="far fa-comment open-messages-icon"></i>
    </v-touch>
    <v-touch v-touch:tap="closeMessages" class="message-button close-messages">
      <i class="fas fa-times close-messages-icon"></i>
    </v-touch>
    <div class="transparent-bg" v-touch="closeMessages"></div>
    <div class="chat-wrap">
      <div class="chat-box">
        <div style="display:flex;justify-content:space-between;align-items:center;padding-bottom:10px; border-bottom:1px solid #f4f4f4">
          <div class="chat-heading" style="display:flex;align-items:center;">
            <i v-touch:tap="closeMessages" class="fas fa-chevron-down" style="padding:0px 20px;"></i>
            <p style="margin:0;padding-right:20px;">Vaše konverzacije</p>
          </div>
          <p style="margin:0;padding-right:20px;cursor:pointer">
            <i class="fas fa-plus"></i>
          </p>
        </div>
        <div>
        <allconversations v-bind:conversations="messages"></allconversations>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import allconversations from './AllConversations'
export default {
    components:{
        allconversations:allconversations
    },
  data() {
    return {
      show: false,
      messages: "",
      user: ""
    };
  },
  mounted() {
    this.$anime,
      $(".messages-wrap").scroll(function(event) {
        event.stopPropagation();
      });
    this.fetchData();
  },
  methods: {
    openMessages() {
      $(".open-messages").addClass("z-index-lower");
      $(".transparent-bg").addClass("transparent-bg-visible");
      $("body").addClass("overflow");
      this.$anime({
        targets: ".open-messages",
        borderRadius: "8x",
        duration: 100,
        backgroundColor: "#ffffff"
      });
      this.$anime({
        targets: ".open-messages-icon",
        rotate: "180deg",
        opacity: 0
      });
      this.$anime({
        targets: ".close-messages",
        duration: 100,
        backgroundColor: "#ffffff",
        borderRadius: "4px"
      });
      this.$anime({
        targets: ".close-messages-icon",
        rotate: "90deg",
        opacity: 1,
        color: "#003368"
      });
      this.$anime({
        targets: ".chat-wrap",
        height: "60%",
        width: "100%",
        scale: 1,
        borderRadius: "4px",
        duration: 150,
        easing: "linear"
      });
    },
    closeMessages() {
      $(".open-messages").removeClass("z-index-lower");
      $(".transparent-bg").removeClass("transparent-bg-visible");
      // $('.chat-box').removeClass('chatbox-visible');
      $("body").removeClass("overflow");
      this.$anime({
        targets: ".close-messages",
        duration: 250,
        backgroundColor: "#003368",
        borderRadius: "50px"
      });
      this.$anime({
        targets: ".close-messages-icon",
        rotate: "-90deg",
        opacity: 0,
        color: "#ffffff"
      });
      this.$anime({
        targets: ".open-messages",
        borderRadius: "50px",
        duration: 250,
        backgroundColor: "#003368"
      });
      this.$anime({
        targets: ".open-messages-icon",
        rotate: "360deg",
        opacity: 1,
        color: "#ffffff"
      });
      this.$anime({
        targets: ".chat-wrap",
        scale: 0,
        borderRadius: "50px",
        duration: 100,
        // keyframes:[
        //     {backgroundColor:'transparent',delay:100}
        // ],
        easing: "cubicBezier(0.895, 0.030, 0.685, 0.220)"
      });
    },

    fetchData() {
      axios.get("/api/messages").then(response => {
        this.user = response.data[0];
        this.messages = response.data[1];

      });
    }
  }
};
</script>
