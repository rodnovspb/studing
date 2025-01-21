<script setup>

import {ref} from "vue";

const color = ref('green')

const danger = ref(true)

</script>



<template>

  <p :style="{ 'color': color }">Lorem ipsum dolor sit amet.</p>

  <p @click="danger = !danger" :class="{ red: danger }">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, dolorum!</p>



</template>



<style scoped>

.red {
  color: red;
}



</style>