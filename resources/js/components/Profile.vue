<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">  
                <p>{{user.name}}</p>
                <p>{{user.lastname}}</p>
                <p>{{user.phone_number}}</p>
                <p>{{user.city}}</p>
                <img :src="'../../../storage/app/public/assets/user_images/' + user.profile_picture" alt="Profile Picture">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'user': [],
                'currentUrl': window.location.pathname
            }
        },
        mounted() {
            this.fetchUser()
        },
        methods:{
            fetchUser(){
                axios.get('/api'+ this.currentUrl)
                .then(response => {
                    this.user = response.data[0]
                    console.log(this.user)
                })
            }
            
        }
    }
</script>
