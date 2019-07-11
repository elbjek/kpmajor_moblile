<template>
  <div class="all-chat-messages">
    <div class="all-messages-header">
      <i v-touch:tap="closeSingleChat" class="fas fa-chevron-left" style></i>
    </div>
    <div class="chat-messages">
      <div
        style="display:flex; align-items:center;"
        v-for="message in singleconversation.messages"
        :key="message.id"
      >
        <div class="img">
          <img :src="'/storage/user_images/'+ singleconversation.profile_picture" alt />
        </div>
        <div class="single-message-wrap">
          <p>{{message.message_content}}</p>
        </div>
      </div>
    </div>
      <div class="send-message">
        <i class="far fa-images"></i>
        <input type="text" class="message-input" placeholder="Aa" v-on:click="openInput"/>
        <i class="far fa-paper-plane"></i>
      </div>
  </div>
</template>

<script>
import { EventBus } from "../../app";
import { setTimeout } from "timers";

export default {
  data() {
    return {
      show: false,
      messages: "",
      currentUrl: window.location.pathname,
      singleconversation: {},
      conversationID: "",
      show: false,
      username: ""
    };
  },
  mounted() {
    EventBus.$on("closeSingleMesage", () => {
      this.$anime({
        targets: ".all-chat-messages",
        height: 0,
        width: 0
      });
    });
    EventBus.$on("getConversationID", id => {
      this.conversationID = id;
      axios.get("/api/conversations/" + this.conversationID).then(response => {
        this.singleconversation = response.data;
        console.log(response.data);
        this.username = response.data.name;
        EventBus.$emit("sendUsername", this.username);
      });
      this.$anime({
        targets: ".all-chat-messages",
        keyframes: [
          {
            opacity: 1,
            height: "83%",
            width: "100%",
            right: "-450px",
            duration: 200,
            easing: "linear",
            padding: "10px 0px 10px 0px"
          },
          { right: 0, duration: 250, delay: 350, easing: "linear" }
        ]
      });
      this.$anime({
        targets: ".all-messages-header",
        keyframes: [
          {
            width: "100%",
            scale: 1,
            right: "-450px",
            duration: 200,
            easing: "linear"
          }
        ]
      });
      this.$anime({
        targets: ".send-message",
        translateX:0,

      });
      $(".all-messages-header i").css(
        { padding: "5px 0px 20px 20px" },
        { "border-bottom": "1px solid #f4f4f4" }
      );
      
      $(".chat-messages").css({ padding: "10px 20px" });
    });
  },
  methods: {
    openInput(){
      this.$anime({
        targets:'.message-input',
        padding:10,
        borderRadius:40,
        easing:'linear',
        duration:250
      })
      this.$anime({
        targets:'.fa-images',
        width: 0,
        height: 0,
        'visibility': 'hidden',
        opacity: 0,
        display: 'none',
      })
      this.$anime({
        targets:'.fa-paper-plane',
        padding:20,
        duration:150,
        easing:'linear'
      })
    },
    closeSingleChat() {
      var el = $(".all-chat-messages").width();
      this.$anime({
        targets: ".all-chat-messages",
        keyframes: [
          { right: 0, duration: 50, easing: "linear" },
          {
            opacity: 1,
            height: "83%",
            width: "100%",
            right: "-450px",
            duration: 150,
            easing: "linear",
            // padding: "0px"
          }
        ]
      });

      this.$anime({
        targets: ".fa-chevron-down",
        rotate: "0deg"
      });
      this.$anime({
        targets: ".single-chat-main-heading",
        keyframes: [
          { translateY: 20, opacity: 0, duration: 200, easing: "linear" }
        ]
      });
      this.$anime({
        targets: ".chat-main-heading",
        translateY: 0,
        opacity: 1,
        duration: 200,
        easing: "linear"
      });
      let userswrap = $(".users-wrap").width() + 50;
      this.$anime({
        targets: ".users-wrap",
        translateX: 0,
        easing: "linear",
        duration: 200,
        delay: 250
      });
      $(".all-messages-header i").css({ padding: "0" }, { border: "none" });
    }
  }
};
</script>

