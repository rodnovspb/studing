<script setup>
const props = defineProps({
  title: String,
  price: Number,
  isAdded: Boolean
})



</script>


<template>
  <div>{{ title }} {{ price }} {{ isAdded }}</div>
</template>



<style scoped>

</style>
