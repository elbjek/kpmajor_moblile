<template>
    <div class="test">

    </div>
</template>

<script>
import Slick from 'vue-slick';
    export default {
        components: { Slick },
        props:['product'],
        data() {
            return {
                'products': this.product   
            }
        },
        mounted() {
            // this.fetchData();

        },
    }
</script>
