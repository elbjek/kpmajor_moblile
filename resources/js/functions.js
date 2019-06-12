

import anime from 'animejs';


setTimeout(()=>{

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