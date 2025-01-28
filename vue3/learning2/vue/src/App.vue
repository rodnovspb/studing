<script setup>
import { ref, reactive, computed } from 'vue';

const products = ref([
  { title: 'Бананы', price: 1000 },
  { title: 'Апельсины', price: 2000 },
  { title: 'Арбузы', price: 3000 },
  { title: 'Грибы', price: 4000 },

])

const filtered = computed(() => products.value.filter((item) => item.startsWith(search.value)))

const reverseQuery = computed(() => {
  return search.value.split('').reverse().join('')
})

const search = ref('')



</script>

<template>
  <input type="search" placeholder="Введите" v-model="search">
  <div v-if="reverseQuery">{{ reverseQuery }}</div>
  <ul>
    <li v-for="product in filtered" :key="product">
      {{ product }}
    </li>
  </ul>

</template>

<style>

</style>
