<template>
<div class="messages-wrap" >
    {{this.messages}}
</div>
</template>

<script> 
export default {  
    data(){
        return{
            show:false,
            messages:'',
             'currentUrl': window.location.pathname,
        }
    },
    mounted(){
    this.fetchData()
    },
    methods:{
        fetchData(){
            axios.get('/api'+this.currentUrl)
            .then(response => {
                this.messages = response.data,
                console.log(this.messages)
            })
        },        
    }

}
</script>
