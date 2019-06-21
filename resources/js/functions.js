import Vue from 'vue';
export const EventBus = new Vue();

import anime from 'animejs';


setTimeout(()=>{

    $('.navigation-item').on('click', function(){
        // $('.drop-navigation').removeClass('show-nav')
        $(this).parent().parent().removeClass('show-nav')
    })
    $('.nav-button').on('click',function(){
        $('.drop-navigaton').toggleClass('show-nav');
    })
},100)

// var checkExist = setInterval(function() {
//     if ($('.nav-button').length) {
//        console.log("Exists!");
//        clearInterval(checkExist);
//     }
//  }, 100); 