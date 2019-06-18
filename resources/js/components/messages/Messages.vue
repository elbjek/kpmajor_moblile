<template>
<div class="messages-wrap" v-if="user" >
    <button v-touch="handleModal" v-bind:class="{messageButtonWhite:show}" class="message-button">
        <i class="far fa-comment"></i>
    </button>
    <div class="transparent-bg" v-touch="closeModal"></div>
    <div class="chat-wrap">
       <div class="chat-box">
            <div class="chat-heading">
                <i v-touch:tap="handleModal" class="fas fa-chevron-down"></i>
                <p>Vaše konverzacije</p>
            </div>
            <div style="overflow:scroll; height:70%" >
                <div class="users-wrap" v-for="conversation in messages" :key="conversation.id">
                    <div class="image-wrap">
                        <div class="img">
                            <img :src="'/storage/user_images/' + conversation.profile_picture">
                        </div>
                        <span v-bind:class="{ online: conversation.online }"></span>
                    </div>
                    <div class="message-wrap">
                        <div class="user-info">
                            <h6>{{conversation.name}} {{conversation.lastname}}</h6>
                            <h6 class="time">14:40</h6>
                        </div>
                        <div class="time">
                            <span class="message">{{conversation.message_content}}</span>
                            <span v-bind:class="{new:conversation.seen}" ></span>
                        </div>
                    </div>
                </div>        
            </div>
       </div>
    </div>
</div>
</template>

<script> 
export default {  
    data(){
        return{
            show:false,
            messages:'',
            user:''
        }
    },
    mounted(){
        this.$anime,
        $( ".messages-wrap" ).scroll(function( event ) {
        event.stopPropagation();//Do not bubble up the DOM, do not scroll document.
        });
    this.fetchData()
    },
    methods:{
        handleModal(){
            this.show=!this.show
            $('.chat-box').toggleClass('chat-show')
            $('.chat-wrap').toggleClass('chat-height')
            $('body').toggleClass('overflow')
            $('.transparent-bg').toggleClass('modal-background')
        },
        closeModal(){
            $('.chat-box').removeClass('chat-show');
            $('.chat-wrap').toggleClass('chat-height');
            $('body').removeClass('overflow');
            $('.transparent-bg').removeClass('modal-background')
        },
        fetchData(){
            axios.get('/api/messages')
            .then(response => {
                this.user = response.data[0]
                this.messages = response.data[1]
            })
        },        
    }

}
</script>
