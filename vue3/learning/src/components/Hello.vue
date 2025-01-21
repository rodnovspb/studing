<script setup>

  import {ref} from "vue";

  const emit = defineEmits(['func'])


</script>

<template>

  <button @click="emit('func')">+</button>


</template>

<style scoped>

</style>