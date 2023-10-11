<template>
  <div v-for="post in posts">{{ post }}</div>
  <button @click="deleteNum">-</button>
</template>

<script>
 export default {
   props: {
     posts: Array,
     deleteNum: Function
   }
 };
</script>

<style scoped>

</style>