<template>
  <div class="messages-wrap" v-if="user">
    <v-touch class="message-button">
      <i class="far fa-comment open-messages-icon" v-touch:tap="openMessages"></i>
      <!-- <i class="fas fa-times close-messages-icon" v-touch:tap="closeMessages" style="opacity:0
      "></i>-->
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
              <span class="chat-new-heading" >Nova poruka</span>
            </p>
            <!-- <p class="single-chat-main-heading">username</p> -->
          </div>
          <p style="margin:0;padding-right:20px;cursor:pointer" class="createmsg" @click="createNewMessage">
            <i class="fas fa-plus"></i>
          </p>
        </div>
        <div>
          <newconversation></newconversation>
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
import newconversation from "./NewMessage";
import { setTimeout } from "timers";
export default {
  components: {
    allconversations: allconversations,
    singleconversation: singleconversation,
    newconversation: newconversation
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
        targets: ".chat-main-heading",
        translateY: -40,
        delay: 300,
        duration: 100
      });
      this.$anime({
        targets: ".fa-chevron-down",
        rotate: "90deg",
        easing: "linear",
        duration: 200,
        delay: 250
      });
      let userswrap = $(".users-wrap").width() + 50;
      this.$anime({
        targets: ".users-wrap",
        translateX: -userswrap,
        easing: "linear",
        duration: 200,
        delay: 250
      });
    });
  },
  methods: {
    createNewMessage() {
      $('.fa-chevron-down').css({'opacity':0})
      this.$anime({
        targets:'.createmsg i ',
        rotate:45
      })
      this.$anime({
        targets: ".new-message-wrap",
        easing:'linear',
        translateX: 0,
        duration: 250,
        opacity: 1,
        "z-index": 18
      });
      this.$anime({
        targets:'.users-wrap',
        translateX:-$('.users-wrap').width() - 100,
      })
    this.$anime({
      targets:'.chat-new-heading',
      keyframes:[
        {translateY:30,opacity:0,duration:10},
        {      translateY:0,
      opacity:1,duration:450}
      ]
    })
      this.$anime({
      targets:'.chat-main-heading',
      translateY:-30
    })
    },
    openMessages() {
      this.$anime({
        targets: ".message-button i",
        borderRadius: "8px",
        duration: 100,
        easing: "linear",
        backgroundColor: "#ffffff",
        rotate: 90
      });
      this.$anime({
        targets: ".close-messages-icon",
        duration: 150,
        easing: "linear",
        color: "#003368",
        opacity: 1
      });
      // $(".close-messages-icon").css({ "z-index": "11" });
      // $(".open-messages-icon").css({ "z-index": "10" });
      // $('.message-button').css({'z-index':'14','visibility':'hidden'})
      $(".transparent-bg").addClass("transparent-bg-visible");
      $("body").addClass("overflow");
      this.$anime({
        targets: ".chat-wrap",

           scale: 1,
        borderRadius: "4px",
        duration: 150,
        
        visibility:'visible',
        easing: "linear"
      });
    },
    closeMessages() {
      $('.message-button').css({'z-index':'14','visibility':'visible'})
      //       this.$anime({
      //   targets: ".new-message-wrap",
      //   translateX: $('.new-message-wrap').width(),
      //   delay:200,
      //   duration: 1000,
      //   opacity: 0,
      // });
      this.$anime({
        targets: ".message-button i",
        borderRadius: "50px",
        duration: 50,
        easing: "linear",
        rotate: 0,
        delay:200,
        backgroundColor: "#003368"
      });
      // this.$anime({
      //   targets: ".close-messages-icon",
      //   "z-index": 10,
      //   opacity: 0
      //   // delay:1000
      // });
      // this.$anime({
      //   targets: ".open-messages-icon",
      //   "z-index": 11
      //   // delay:1000
      // });
      // this.$anime({
      //   targets: ".all-chat-messages",
      //   keyframes: [
      //     { right: 0, duration: 100, easing: "linear" },
      //     {
      //       opacity: 1,
      //       height: "0%",
      //       width: "0%",
      //       right: "-450px",
      //       duration: 300,
      //       easing: "linear",
      //       padding: "0px"
      //     }
      //   ]
      // });
      // this.$anime({
      //   targets: ".fa-chevron-down",
      //   rotate: "0deg"
      // });
      // this.$anime({
      //   targets: ".single-chat-main-heading",
      //   keyframes: [
      //     // {translateY:0, opacity:1},
      //     { translateY: 20, opacity: 0, duration: 400, easing: "linear" }
      //   ]
      // });
      // this.$anime({
      //   targets: ".chat-main-heading",
      //   translateY: 0,
      //   opacity: 1,
      //   duration: 100,
      //   easing: "linear"
      // });
      // let userswrap = $(".users-wrap").width() + 50;
      // this.$anime({
      //   targets: ".users-wrap",
      //   translateX: 0,
      //   easing: "linear",
      //   duration: 200,
      //   delay: 250
      // });

      $(".transparent-bg").removeClass("transparent-bg-visible");

      $("body").removeClass("overflow");
      this.$anime({
        targets: ".chat-wrap",
        scale: 0,
        // // height:0,
        // // width:0,
        // borderRadius: 50,
        duration: 20,
        visibility:'hidden',
        easing: "linear"
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
