<script setup>

import {ref} from "vue";

const text = ref('Текст')
const flag = ref(1)
const checked = ref(true)
const checkedList = ref(['1'])
const select = ref(['1', '2', '3'])




</script>



<template>

  <input type="text" v-model="text">
  <p>{{ text }}</p>

  <input type="radio" v-model="flag" value="1">
  <input type="radio" v-model="flag" value="2">
  <p>{{ flag }}</p>

  <input type="checkbox" v-model="checked">
  <p>{{ checked }}</p>

  <input type="checkbox" v-model="checkedList" value="1">
  <input type="checkbox" v-model="checkedList" value="2">
  <input type="checkbox" v-model="checkedList" value="3">
  <p>{{ checkedList }}</p>

  <select v-model="select" multiple>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select>
  <p>{{ select }}</p>



</template>



<style scoped>





</style>