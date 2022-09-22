<template>
  <button @click="toggle">изменить</button>
	<p v-if="!hidden">ыфвфывфы</p>
</template>


<script>

  export default {
   data(){
     return {
       hidden: false
     }
   },
    methods: {
     toggle(){
       this.hidden = !this.hidden
     }
    }
  }







</script>