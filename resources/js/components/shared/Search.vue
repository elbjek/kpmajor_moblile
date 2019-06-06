<template>
<div class="search-component">
    <div class="alert alert-danger" role="alert" v-if="error">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    @{{ error }}
    </div>
    <div class="form-group">
        <div class="search-bar" id="search">
            <div class="col-11 input-wrap">
                <input type="text" class="input" placeholder="Pretraga" @click="showFilters"  v-model="query">
            </div>
            <!-- <div class="searchicon" v-show="hide">
                <i class="fas fa-search"></i>
            </div> -->
           <div class="cancel" v-show="show">
                <i @click="removeFilters" v-bind:class="{show:show}" class="fas fa-times"></i>
           </div>
        </div>

        <div class="filters-wrap" v-show="show" v-bind:class="{filtertransition:show}">
         <div class="filter-buttons" >
            <label class="checkbox">Naslov
                <input type="checkbox" >
                <span class="checkmark"></span>
            </label>
            <label class="checkbox">Tekst oglasa
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
        </div>
          <div class="filter">
              <span>Filteri</span>
                <i class="fas fa-sliders-h"></i>
          </div>
        </div>
    </div>
</div>
</template>

<script>
export default {  
    data(){
        return{
                products: [],
                loading: false,
                error: false,
                query: '',
                show:false,
                hide:true,
        }
    },
    mounted(){
    this.$anime
    },
    methods:{        
        removeFilters(e){
            this.$anime({
                targets: '.cancel',
                translateX: 15,
                keyframes: [
                    {translateX: 20,
                    scaleX:0.9
                    },
                    {translateX: 20,
                    scaleX:0.8},
                ],
                easing: 'cubicBezier(.5, .05, .1, .3)',
            });
            this.show = false;
            this.hide = true;
            $('.input').removeClass('enlarge-search')
        } ,
        showFilters(){
            $('.input').addClass('enlarge-search')
            this.show = true;
            this.hide = false;
            this.cancel()       
             },
        cancel(){
            var animation = this.$anime({
                targets: '.cancel',
                duration:420,
                keyframes: [
                    {translateX: 20,
                    scaleX:0.9
                    },
                    {translateX: 0,
                    scaleX:1},
                ],
                 easing: 'cubicBezier(.5, .05, .1, .3)',
            })
            animation.play()
        }               
    }

}
</script>
