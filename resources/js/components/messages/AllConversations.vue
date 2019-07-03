<template>
  <div class="messages-wrap">
    <v-touch class="users-wrap" v-for="(conversation) in conversations" :key="conversation.id" v-on:tap="showMessages(conversation.id)">
      <div class="image-wrap">
        <div class="img">
          <img :src="'/storage/user_images/' + conversation.profile_picture">
        </div>
        <span class="offline" v-bind:class="{ online: conversation.online }"></span>
      </div>
      <div class="message-wrap">
        <div class="user-info">
          <h6>{{conversation.name}} {{conversation.lastname}}</h6>
          <span class="time">14:40</span>
        </div>
        <div class="last">
          <span class="last-message">{{conversation.message_content}}</span>
          <span v-bind:class="{new:conversation.seen}"></span>
        </div>
      </div>
    </v-touch>
  </div>
</template>

<script>
import singleconversation from "./singleConversation";
import {EventBus} from '../../app';
export default {
  props: ["conversations"],
  components: { singleconversation: singleconversation },
  data() {
    return {
      show: false,
      messages: "",
      currentUrl: window.location.pathname,
      conversationID:''
    };
  },
  mounted() {
    //   console.log(this.conversations)
  },
  methods:{
    showMessages(index){
      this.conversationID = index
      // console.log(index);
       EventBus.$emit('getConversationID',this.conversationID)
       
    }
  }
};
</script>
