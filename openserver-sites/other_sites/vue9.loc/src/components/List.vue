<template>
  <div>{{ text }}</div>
  <button @click="$emit('update:text', '111')">-</button>
</template>

<script>
 export default {
   data() {
     return {

     }
   },
   props: {
     text: String,
   }
 };
</script>

<style scoped>

</style>