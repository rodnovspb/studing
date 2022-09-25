<template>
  <div :class="styles">Lorem ipsum dolor sit amet.</div>

  <button @click="change">Зачеркнуть</button>
</template>

<style>
  .hidden {
    display: none;
  }
</style>

<script>

  export default {
        data(){
          return {
            styles: {
              hidden: false
            }
          }
        },
        methods: {
          change(){
            this.styles.hidden = !this.styles.hidden
          }
        }
      }









</script>