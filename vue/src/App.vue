<template>
  <p :class="{black: isActive, white: isDisabled}">Lorem ipsum dolor sit amet.</p>
</template>

<style>
  .black {
    background-color: #bf1f1f;
  }
  .white {
    color: #fff;
  }
</style>

<script>

  export default {
        data(){
          return {
            isActive: true,
            isDisabled: false,
          }
        },
      }









</script>