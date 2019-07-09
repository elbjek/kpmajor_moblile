<template>
  <div class="comments-wrap">
      <h2>Komentari</h2>
    <div class="comment" v-for="comment in comments" :key="comment.id">
      <div class="img">
        <img :src="'/storage/user_images/'+comment.profile_picture" alt />
      </div>
      <div class="comment-wrap">
        <div class="user-info">
          <h5>{{comment.name}} {{comment.lastname}}</h5>
         <div class="date"><p>
             {{formatDate}}
             </p>
             </div>
        </div>
        <div class="comment-message">
          <p>{{comment.comment_content}}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../app";

export default {
  data() {
    return {
      show: false,
      comments: []
    };
  },
  mounted() {
    EventBus.$on("sendComments", data => {
      this.comments = data;
      console.log(this.comments)
    });
  },
  computed: {
    formatDate() {
      var moment = require("moment");
      var time = this.comments.created_at;
      return moment(time).format("MMM Do YY");
    }
  }
};
</script>
