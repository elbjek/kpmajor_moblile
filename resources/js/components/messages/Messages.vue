<template>
<div class="messages-wrap"  >
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
    this.$anime,
    $( ".messages-wrap" ).scroll(function( event ) {
    event.stopPropagation();//Do not bubble up the DOM, do not scroll document.
    });
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
        }
    }

}
</script>
