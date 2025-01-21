<script setup>

import {ref} from "vue";
import Hello from "@/components/Hello.vue";

const groceryList = ref([
  { id: 0, text: 'Овощи' },
  { id: 1, text: 'Сыр' },
  { id: 2, text: 'Что угодно съедобное для человека' }
])




</script>



<template>

<Hello v-for="item in groceryList" :key="item.id" :todo="item"/>



</template>



<style scoped>





</style>