<template>

  <button @click="$emit('update:modelValue', !modelValue)">Кнопка</button>
</template>

<script>
 export default {
   data() {
     return {

     }
   },
   props: ['modelValue']
 };
</script>

<style scoped>

</style>