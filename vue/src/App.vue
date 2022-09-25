<template>
  <p :class="{red: isActive}">Lorem ipsum dolor sit amet.</p>
</template>

<style>
  .red {
    color: red;
  }
</style>

<script>

  export default {
        data(){
          return {
            isActive: true,

          }
        },
      }









</script>