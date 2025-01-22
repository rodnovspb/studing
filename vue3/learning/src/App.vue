<script setup>
import { ref, reactive } from 'vue'

const stats = reactive([
  { label: 'A', value: 100 },
  { label: 'B', value: 100 },
  { label: 'C', value: 100 },
  { label: 'D', value: 100 },
  { label: 'E', value: 100 },
  { label: 'F', value: 100 }
])

const newLabel = ref('')


</script>

<template>
  <svg width="200" height="200">
    <circle cx="100" cy="100" r="50" stroke="red" stroke-width="5" fill="transparent"></circle>
  </svg>


</template>

<style scoped>

</style>