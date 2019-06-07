<template>
<div class="messages-wrap">
    <div class="message-button" @click="showModal" v-bind:class="{ messageButtonWhite: show }">
        <i class="far fa-comment"></i>
    </div>
    <div class="chat-wrap">
       <div class="chat">
        <div class="chat-heading">
            <i @click="closeModal" class="fas fa-chevron-down"></i>
            <p>Vaše konverzacije</p>
        </div>
        <div class="search">
            <input type="text" placeholder="Pretraga">
        </div>
        <div class="users-wrap">
            <div class="image-wrap">
                <div class="img">
                    <img src="https://images.unsplash.com/photo-1507007727303-1532f71109cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="">
                </div>
                <span class="online"></span>
            </div>
            <div class="message-wrap">
                <div class="user-info">
                    <h6>Jovana Milicevic</h6>
                    <h6 class="time">14:40</h6>
                </div>
                <div class="time">
                    <span class="message">latest message</span>
                    <span class="new"></span>
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
            messages:''
        }
    },
    mounted(){
    this.$anime
    },
    methods:{        
        showModal(){
            this.show =true
            // this.scaleChat()
        },
        closeModal(){
            $('.chat-wrap').addClass('wrapper-opacity')
            this.test()
        },   
        test(){
            this.$anime({
                    targets: '.chat-wrap',
                    delay: 1000,
                    keyframes: [
                        {
                        scale:1,
                        translate:0,
                        transformOrigin:'bottom right'
                        },
                        {
                        scale:0.5,
                        translateZ:'-400px',
                        translateY:'200px',
                        translateX:'200px',
                        transformOrigin:'bottom right'
                        },
                        {
                            //  scale(0.2) translateZ(-700px) translateY(1400px) translateX(600px)
                        scale:0.0,
                        // translateZ:'-700px',
                        // translateY:'1300px',
                        // translateX:'600px',
                        // transformOrigin:'bottom right'
                        },
                    ],
                    easing: 'cubicBezier(.5, .05, .1, .3)',
                    transformOrigin:"bottom right"
                })
        },
        scaleChat(){
            this.$anime({
                targets: '.chat',
                duration:720,
                rotate:"22deg",
                easing: 'cubicBezier(.5, .05, .1, .3)',

            })
        }
    }
}
</script>
