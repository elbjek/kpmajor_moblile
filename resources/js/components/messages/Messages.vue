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
        <div
          class="chatbox-header"
          style="display:flex;justify-content:space-between;align-items:center;padding-bottom:10px; border-bottom:1px solid #f4f4f4"
        >
          <div class="chat-heading" style="display:flex;align-items:center;">
            <i v-touch:tap="closeMessages" class="fas fa-chevron-down" style="padding:0px 20px;"></i>
            <p style="display:flex; flex-direction:column;margin:0">
              <span class="chat-main-heading" style="margin:0;padding-right:20px;">Vaše konverzacije</span>
              <span class="single-chat-main-heading">{{username}}</span>
            </p>
            <!-- <p class="single-chat-main-heading">username</p> -->
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
    <singleconversation></singleconversation>
  </div>
</template>

<script>
import { EventBus } from "../../app";
import allconversations from "./AllConversations";
import singleconversation from "./singleConversation";
import { setTimeout } from "timers";
export default {
  components: {
    allconversations: allconversations,
    singleconversation: singleconversation
  },
  data() {
    return {
      show: false,
      messages: "",
      user: "",
      username: ""
    };
  },
  mounted() {
    this.$anime,
      $(".messages-wrap").scroll(function(event) {
        event.stopPropagation();
      });
    this.fetchData();
    EventBus.$on("sendUsername", data => {
      this.username = data;

        this.$anime({
          targets: ".single-chat-main-heading",
          keyframes: [
            { translateY: 40, opacity: 0 },
            {
              translateY: 0,
              duration: 100,
              easing: "linear",
              opacity: 1
            }
          ]
        });
        this.$anime({
          targets:'.chat-main-heading',
          translateY:-40,
          delay:300,
          duration:100
        })
        this.$anime({
        targets:'.fa-chevron-down',
        rotate:'90deg',
        easing:'linear',
        duration:200,
        delay:250
      })
      let userswrap = $('.users-wrap').width()+50
        this.$anime({
        targets:'.users-wrap',
        translateX:-userswrap,
        easing:'linear',
        duration:200,
        delay:250
      })
    
    });
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
        easing: "cubicBezier(0.895, 0.030, 0.685, 0.220)"
      });
    },

    fetchData() {
      axios.get("/api/messages").then(response => {
        this.user = response.data[0];
        this.messages = response.data[1];
        console.log(this.messages);
      });
    }
  }
};
</script>
