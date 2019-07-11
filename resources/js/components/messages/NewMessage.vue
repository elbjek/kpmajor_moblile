<template>
  <div class="new-message-wrap">
    <div
      class="new-message-heading"
      style="display:flex;justify-content:space-between;align-items:center;padding-bottom:10px;padding-top:10px; border-bottom:1px solid #f4f4f4"
    >
      <div class="chat-heading" style="display:flex;align-items:center;">
        <p style="display:flex; flex-direction:column;margin:0">
           <i  class="fas fa-chevron-down" style="padding:0px 20px;"></i>
          <!-- <span class="chat-main-heading" style="margin:0;padding-right:20px;">Nova poruka</span> -->
          <span class="single-chat-main-heading"></span>
        </p>
      </div>
      <p style="margin:0;padding-right:20px;cursor:pointer;opacity:0" @click="closeMessage">
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
        placeholder="Trazi"
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
        height: "40%",
        padding:'10px 20px'
      });
    },
    closeMessage() {
      $('.fa-chevron-down').css({'opacity':1})

      this.$anime({
        targets: ".new-message-wrap",
        translateX: $(".new-message-wrap").width(),
        // delay: 200,
        duration: 800,
        opacity: 0
      });
      this.$anime({
        targets:'.createmsg i ',
        rotate:0
      })
        this.$anime({
        targets:'.users-wrap',
        translateX:0,
        easing:'linear',
        duration:250
      })
      this.$anime({
      targets:'.chat-new-heading',
      keyframes:[
        {  translateY:0,
      opacity:1,duration:10},
        {translateY:30,opacity:0,duration:450},
      ]
    })
      this.$anime({
      targets:'.chat-main-heading',
      translateY:0
    })
    },
    filterUsers() {
      if (this.search === "" || this.search.length == 0) {
        this.$anime({
          targets: ".user-list",
          translateY: -20,
          opacity: 0
          //   height:0
        });

      } else {
        this.$anime({
          targets: ".user-list",
          translateY: 0,
          opacity: 1,
          "max-height": "40%",
          height: "auto"
        });

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

