<script setup>

import {ref, watch} from "vue";

const num = ref(0)

watch(num, async (newValue) => {
  try {
    let res = await fetch('https://jsonplaceholder.typicode.com/todos/' + newValue)
    let data = await res.json()

    console.log(data)

  } catch (e) {
    console.log(e)
  }
})


</script>


<template>

  <button @click="num++">+</button>


</template>





<style scoped>


</style>