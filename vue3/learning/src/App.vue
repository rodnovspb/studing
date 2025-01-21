<script setup>

import {ref, watch} from "vue";

const num = ref(0)

watch(num, () => {
  try {
    fetch(`https://jsonplaceholder.typicode.com/todos/${num.value}`)
        .then((res) => res.json())
        .then(res => console.log(res))

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