<script setup>

import { ref } from 'vue'

let count = ref(0)

const inc = () => count.value ++


</script>


<template>
  <div>{{ count }}</div>
  <button @click="inc">+</button>
</template>




<style scoped>

</style>
