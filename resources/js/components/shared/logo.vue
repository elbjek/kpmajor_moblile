<template>
	<router-link class="mylogo"  id="logo" to="/" @click.prevent="closeNav">
	<span class="logo-red">k</span>
	<span class="logo-red">u</span>
	<span class="logo-orange">p</span>
	<span class="logo-orange">u</span>
	<span class="logo-green">j</span>
	<span class="logo-green">e</span>
	<span class="logo-lightblue">m</span>
	<span class="whole-word">prodajem</span>
	</router-link>
</template>

<script>
import {EventBus} from '../../app';
export default {

methods:{
	closeNav(){
		EventBus.$emit('closeNav',()=>{
			console.log('closed')
		})
	}
}

}
</script>