<template>
  <button @click="toggle">{{ show ? 'скрыть':'показать'}}</button>
  <template v-if="show">
    <p>Lorem ipsum dolor sit amet.</p>
    <p>Lorem ipsum dolor sit amet.</p>
    <p>Lorem ipsum dolor sit amet.</p>
  </template>
</template>


<script>

  export default {
    data(){
      return {
        show: false
      }
    },
    methods: {
      toggle(){
        this.show = !this.show
      }
    }
  }







</script>