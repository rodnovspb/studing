<script setup>
import { ref } from 'vue'
  const count = ref(0)
</script>

<template>
  {{ count }}
  <button @click="count++">+</button>
</template>

<style scoped>

</style>