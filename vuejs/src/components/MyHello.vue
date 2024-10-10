<script setup>

import {ref} from "vue";

const count = ref(0)

const increment = () => count.value++

</script>





<template>
  <h1>{{ count }}</h1>
  <button @click="increment">+1</button>
  <input @keyup.ctrl.enter = "increment">

</template>




<style scoped>

</style>