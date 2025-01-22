<script setup>
import { ref, watchEffect } from 'vue'

const props = defineProps({
  query: String,
  data: Array,
  columns: Array
})

const filteredData = ref([])
const sortKey = ref('')


watchEffect(() => {
  const { query,  data } = props
  if(query) {
    filteredData.value = data.filter(item => {
      let regex = new RegExp(query, 'i')
      if(regex.test(item.name) || regex.test(String(item.power))){
        return true;
      } else {
        return false;
      }
    })
  } else {
    filteredData.value = data
  }
})

const sortBy = (key) => {
  sortKey.value = key

}




</script>

<template>

<table v-if="filteredData.length">
  <thead>
    <tr>
      <th :class="{ active: sortKey === item}" v-for="(item, index) in columns" :key="index" @click="sortBy(item)">{{ item }}</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(item, index) in filteredData" :key="index" >
      <td>{{ item.name }}</td>
      <td>{{ item.power }}</td>
    </tr>
  </tbody>
</table>

<p v-else>Совпадений не найдено</p>

</template>

<style scoped>
  .active {
    color: red;
  }
</style>