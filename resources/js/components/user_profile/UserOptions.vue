<template>
    <div class="swipe-options-wrap">
        <div class="edit option">
            <router-link :to="'/products/'+id+'/edit'"><i class="far fa-edit"></i></router-link>
        </div>
        <div class="delete option">
            <a @click="alertme" href="#"><i class="fas fa-minus"></i></a>
        </div>
       </div>
</template>

<script>
    export default {
        data() {
            return {
                'products': [],
                'singleproduct':''
            }
        },
        props:['id'],
        methods:{
            alertme(){
                prompt('Are you sure?')
            }
        }
    }
</script>
