<template>
  <div class="messages-wrap">
    <div class="users-wrap" v-for="conversation in conversations" :key="conversation.id">
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
    </div>
      <div class="messages-wrap">
    <div class="users-wrap" v-for="conversation in messages" :key="conversation.id">
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
    </div>
  </div>
  <!-- <singleconversation v-bing:conversation="conversation"></singleconversation> -->
  </div>
</template>

<script>
import singleconversation from './singleConversation';
export default {
    props:['conversations',],
    components:{singleconversation:singleconversation},
  data() {
    return {
      show: false,
      messages: "",
      currentUrl: window.location.pathname
    };

  },mounted(){
    //   console.log(this.conversations)
  }
 
};
</script>
