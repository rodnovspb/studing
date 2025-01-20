<script setup>
  import {ref} from "vue";

  const flag = ref(true)


</script>


<template>
  <div>{{ selectedOption }}</div>

  <input type="radio" v-model="selectedOption" value="A">
  <input type="radio" v-model="selectedOption" value="B">
  <input type="radio" v-model="selectedOption" value="C">
  <input type="radio" v-model="selectedOption" value="D">


</template>


<style scoped>


</style>