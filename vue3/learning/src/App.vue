<script setup>

import {onMounted, ref} from "vue";

const elem = ref(null)

onMounted(() => {
  document.querySelector('p').textContent = 111111111111111
  elem.value.textContent = 111111111111111
})

</script>


<template>

  <p ref="elem">Lorem ipsum dolor sit amet.</p>


</template>





<style scoped>


</style>