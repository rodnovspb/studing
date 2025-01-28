<script setup>
import { ref, reactive, computed } from 'vue';

const products = ref([
  { title: 'Бананы', price: 1000 },
  { title: 'Апельсины', price: 2000 },
  { title: 'Арбузы', price: 3000 },
  { title: 'Грибы', price: 4000 },

])

const filtered = computed(() => {
  let productsList = products.value
  if(search.value){
    if(isNumeric(search.value)){
      productsList = products.value.filter((item) => item.price.toString().startsWith(search.value))
    } else {
      productsList = products.value.filter((item) => item.title.startsWith(search.value))
    }

  }
  return productsList

})

const search = ref('')

function isNumeric(value) {
  return !isNaN(parseFloat(value)) && isFinite(value);
}



</script>

<template>
  <input type="search" placeholder="Введите" v-model="search">
  <ul>
    <li v-for="product in filtered" :key="product.title ">
      {{ product.title }} {{ product.price.toLocaleString() }}
    </li>
  </ul>

</template>

<style>

</style>
