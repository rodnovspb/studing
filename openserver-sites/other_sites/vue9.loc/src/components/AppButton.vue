<template>
  <div>
    <button @click="send">+</button>
  </div>

</template>

<script setup>

const emit = defineEmits(['add'])

function send(){
  emit('add', 1)
}











</script>

<style scoped>

</style>