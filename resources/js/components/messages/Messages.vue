<template>
<div class="messages-wrap" v-if="user" >
    <v-touch v-touch:tap="openMessages" class="message-button open-messages">
        <i class="far fa-comment open-messages-icon"></i>
    </v-touch>
    <v-touch v-touch:tap="closeMessages" class="message-button close-messages">
        <i class="fas fa-times close-messages-icon"></i>
    </v-touch>
    <div class="transparent-bg" v-touch="closeMessages"></div>
    <div class="chat-wrap">
       <div class="chat-box">
            <div>
                <div  class="chat-heading">
                <i v-touch:tap="closeMessages" class="fas fa-chevron-down"></i>
                <p>Vaše konverzacije</p>
                </div>
                <p style="margin:0;padding-right:20px; cursor:pointer"><i class="fas fa-plus"></i></p>
            </div>
            <div>
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
                            <span class="last-message">{{conversation.message_content}}</span>
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
        openMessages(){
            $('.open-messages').addClass('z-index-lower')
            $('.transparent-bg').addClass('transparent-bg-visible');
            $("body").addClass("overflow");
            // $('.chat-box').addClass('chatbox-visible');            
            this.$anime({
                targets:'.open-messages',
                borderRadius:'8px',
                duration:150,
                backgroundColor:'#ffffff',
            })
            this.$anime({
                targets:'.open-messages-icon',
                rotate:'180deg',
                opacity:0,
            })
            this.$anime({
                targets:'.close-messages',
                duration:150,
                backgroundColor:'#ffffff',
                borderRadius:'8px',
            })
            this.$anime({
                targets:'.close-messages-icon',
                rotate:'90deg',
                opacity:1,
                color:'#003368'
            })
            this.$anime({
                targets:'.chat-wrap',
                height:'60%',
                width:'100%',
                scale:1,
                borderRadius:8,
                duration:150,
                easing:'linear',
            })
        },
        closeMessages(){
            $('.open-messages').removeClass('z-index-lower')
            $('.transparent-bg').removeClass('transparent-bg-visible');
            // $('.chat-box').removeClass('chatbox-visible');   
            $("body").removeClass("overflow");
            this.$anime({
                targets:'.close-messages',
                duration:250,
                backgroundColor:'#003368',
                borderRadius:'50px',
            })
            this.$anime({
                    targets:'.close-messages-icon',
                rotate:'-90deg',
                opacity:0,
                color:'#ffffff'
            })
            this.$anime({
                targets:'.open-messages',
                borderRadius:'50px',
                duration:250,
                backgroundColor:'#003368'
            })
            this.$anime({
                targets:'.open-messages-icon',
                rotate:'360deg',
                opacity:1,
                color:'#ffffff',
            })
             this.$anime({
                targets:'.chat-wrap',
                scale:0,
                borderRadius:'50px',
                duration:100,
                // keyframes:[
                //     {backgroundColor:'transparent',delay:100}
                // ],
                 easing:'cubicBezier(0.895, 0.030, 0.685, 0.220)'
            })
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
