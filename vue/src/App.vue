<template>
	<p v-if="!hidden">Абзац</p>
  <button @click="show">Показать</button>
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
      show(){
        this.hidden = false
      },
      hide(){
        this.hidden = true
      }
    }
  }







</script>