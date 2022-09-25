<template>
  <p :class="obj">Lorem ipsum dolor sit amet.</p>
</template>

<style>
  .done {
    background-color: blue;
  }
</style>

<script>

  export default {
      data(){
        return {
         obj: {
           done: true,
           selected: false
         }
        }
      }
  }








</script>