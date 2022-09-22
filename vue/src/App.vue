<template>
	<p v-if="hidden">text</p>
  <button @click="hide">Скрыть</button>
</template>


<script>

  export default {
    data(){
      return {
        hidden: true
      }
    },
    methods: {
      hide(){
        this.hidden = false
      }
    }
  }







</script>