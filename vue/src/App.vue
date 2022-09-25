<template>
    <span :class="{active: true, valid: false}">Lorem ipsum dolor sit amet.</span>
</template>

<style>
  .active {
    text-decoration: underline;
  }
  .valid {
    color: #f00;
  }
</style>

<script>

  export default {
        data(){
          return {

          }
        },
        methods: {

        }
      }









</script>