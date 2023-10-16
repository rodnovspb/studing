<template>
  <div>

  <button @click="increment">+</button>
  </div>

</template>

<script setup>
  import {inject} from "vue";



  let {num, increment} = inject('data')


</script>



<style scoped>

</style>