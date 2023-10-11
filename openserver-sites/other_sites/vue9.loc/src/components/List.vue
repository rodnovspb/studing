<template>
  <button @click="$store.commit('changeNumber', 1)">+</button>
</template>

<script>
 export default {
   props: {

   }
 };
</script>

<style scoped>

</style>