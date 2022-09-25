<template>
  <p :class="obj">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, voluptate.</p>

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
          obj: {
            hidden: false,
          },
         }
        },
      methods: {
        change(){
          this.obj.hidden = !this.obj.hidden
        }
      }
      }









</script>