<template>
  <p :class="str">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, temporibus!</p>

</template>

<style>
  .active {
    border: 1px solid blue;

  }
</style>

<script>

  export default {
      data(){
        return {
          str: 'active'
        }
      }
  }








</script>