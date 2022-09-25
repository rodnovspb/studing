<template>
  <p :class="styles">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, voluptate.</p>

  <button @click="change">Зачеркнуть</button>
</template>

<style>
  .through {
    text-decoration: line-through;
  }
</style>

<script>

  export default {
      data(){
        return {
         styles: {
           through: false
          }
         }
        },
      methods: {
        change(){
          this.styles.through = true
        }
      }
      }









</script>