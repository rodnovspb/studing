<template>
	<p v-if="!hidden">Абзац</p>
  <button @click="show">Показать</button>
</template>


<script>

  export default {
    data(){
      return {
        hidden: true
      }
    },
    methods: {
      show(){
        this.hidden = !this.hidden
      }
    }
  }







</script>