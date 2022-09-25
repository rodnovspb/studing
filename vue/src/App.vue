<template>
    <p :class="{active: true, 'with-error': true}">Lorem ipsum dolor sit amet.</p>
</template>

<style>
  .active {
    text-decoration: underline;
  }
  .with-error {
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