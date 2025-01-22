<script setup>
import { ref } from 'vue'
import Grid from "@/components/old/Grid.vue";

const query = ref('')
const gridColumns = ['name', 'power']
const gridData = [
  { name: 'Чак Норис', power: Infinity },
  { name: 'Брюс Ли', power: 9000 },
  { name: 'Джеки Чан', power: 7000 },
  { name: 'Джет Ли', power: 8000 }
]


</script>



<template>

  <input type="text" v-model="query">

  <Grid :query="query" :data="gridData" :columns="gridColumns" />


</template>



<style scoped>





</style>