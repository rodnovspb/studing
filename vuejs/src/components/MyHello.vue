<script setup>



const a = defineProps({
  title: String,
  price: Number,
  isAdded: Boolean
})



</script>





<template>
  <div>
    <ul>
      <li>Название: {{ title }}</li>
      <li>Цена: {{ price }}</li>
      <li>Добавлено: {{ isAdded }}</li>
    </ul>
    <slot></slot>
  </div>

</template>




<style scoped>

</style>