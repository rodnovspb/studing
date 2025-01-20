<script setup>
  import {reactive, ref} from "vue";

  const list = reactive([1,2,3,4,5])

  const addTodo = () => {
    list.push(1)
  }

</script>


<template>

  <ul>
    <li v-for="(item, index) in list" :key="index">{{ index }}</li>
  </ul>

  <button @click="addTodo">+</button>

</template>


<style scoped>


</style>