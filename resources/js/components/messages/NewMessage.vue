<template>
  <div class="new-message-wrap">
    <div
      class="new-message-heading"
      style="display:flex;justify-content:space-between;align-items:center;padding-bottom:10px;padding-top:10px; border-bottom:1px solid #f4f4f4"
    >
      <div class="chat-heading" style="display:flex;align-items:center;">
        <p style="display:flex; flex-direction:column;margin:0">
          <span class="chat-main-heading" style="margin:0;padding-right:20px;">Nova poruka</span>
          <span class="single-chat-main-heading"></span>
        </p>
      </div>
      <p style="margin:0;padding-right:20px;cursor:pointer" @click="closeMessage">
        <i class="fas fa-times"></i>
      </p>
    </div>
    <div class="sendtouser">
      <label for="sendtouser">To:</label>
      <input
        type="text"
        v-model="search"
        class="sendtouser"
        @click="showAllUsers"
        @keyup="filterUsers"
      />
      <div v-if="show" class="selectedUser" @click="removeUser">
        <p>{{selectedUser.name}} {{selectedUser.lastname}}</p>
        <i class="fas fa-times"></i>
      </div>
    </div>
    <div class="user-list">
      <div
        class="single-listed-user"
        v-for="user in filteredUsers"
        :key="user.id"
        @click="selectUser(user)"
      >
        <div class="img">
          <img :src="'/storage/user_images/'+user.profile_picture" alt />
        </div>
        <p>{{user.name}} {{user.lastname}}</p>
      </div>
    </div>
    <div class="message-content"></div>
    <div class="send-message">
      <i class="far fa-images"></i>
      <input type="text" class="message-input" placeholder="Aa" />
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
      search: "",
      users: [],
      selectedUsers: [],
      selectedUser: ""
    };
  },
  mounted() {
    axios.get("/api/users").then(response => {
      this.users = response.data;
      console.log(this.users);
    });
  },
  methods: {
    showAllUsers() {
      this.$anime({
        targets: ".user-list",
        translateY: 0,
        opacity: 1,
        "max-height": "40%",
        height: "auto"
      });
      this.$anime({
          targets:'.sendtouser',
          padding:'8px 4px'
      })
    },
    closeMessage() {
      this.$anime({
        targets: ".new-message-wrap",
        translateX: $(".new-message-wrap").width(),
        delay: 200,
        duration: 1000,
        opacity: 0
      });
    },
    filterUsers() {
      if (this.search === "" || this.search.length == 0) {
        this.$anime({
          targets: ".user-list",
          translateY: -20,
          opacity: 0
          //   height:0
        });
      this.$anime({
          targets:'.sendtouser',
          padding:'4px 4px'
      })
      } else {
        this.$anime({
          targets: ".user-list",
          translateY: 0,
          opacity: 1,
          "max-height": "40%",
          height: "auto"
        });
        this.$anime({
          targets:'.sendtouser',
          padding:'8px 4px'
      })
      }
    },
    selectUser(data) {
      this.show = true;
      this.selectedUser = data;
              this.$anime({
          targets: ".user-list",
          translateY: -20,
          opacity: 0
          //   height:0
        });
    },
    removeUser(){
        this.$anime({
            targets:'.selectedUser',
            scaleX:0,
            opacity:0
        })
        setTimeout(()=>{
           this.show=false
        },100)
        this.$anime({
          targets: ".user-list",
          translateY: 0,
          opacity: 1,
          "max-height": "40%",
          height: "auto"
        });
}
  },
  computed: {
    filteredUsers: function() {
      var self = this;
      var users = this.users;
      return users.filter(function(user) {
        return user.name.toLowerCase().indexOf(self.search.toLowerCase()) >= 0;
      });
    }
  }
};
</script>

