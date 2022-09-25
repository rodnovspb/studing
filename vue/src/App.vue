<template>
  <p :class="cssClasses">Lorem ipsum dolor sit amet.</p>
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
          cssClasses: 'active valid'
        }
      }
  }








</script>