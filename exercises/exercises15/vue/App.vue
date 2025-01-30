<script setup>
  const { ref }  =  Vue
  const count = ref(0)

</script>

<template>
  <div>{{ count }}</div>
  <button @click="count++">+</button>
</template>

<style scoped>

</style>