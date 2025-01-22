<script setup>

import { ref, reactive } from 'vue'
import PolyGraph from "@/components/PolyGraph.vue";

const stats = reactive([
  { label: 'A', value: 100 },
  { label: 'B', value: 100 },
  { label: 'C', value: 100 },
  { label: 'D', value: 100 },
  { label: 'E', value: 100 },
  { label: 'F', value: 100 }
])

const newLabel = ref('')

function add(){
  if(newLabel.value) {
    stats.push({
      label: newLabel.value,
      value: 100
    })
    newLabel.value = ''
  }
}

function remove(stat){
  if(stats.length > 3){
    stats.splice(stats.indexOf(stat), 1)
  } else {
    alert('Нельзя удалить')
  }
}


</script>

<template>
  <svg width="200" height="200">
    <PolyGraph :stats="stats" />
  </svg>


  <form>
    <input type="text" v-model="newLabel">
    <button @click.prevent="add">Добавить</button>
  </form>

  <div v-for="(stat, index) in stats" :key="index">
    <label>{{ stat.label }}</label>
    <input type="range" v-model="stat.value" min="0" max="100">
    <span>{{ stat.value }}</span>
    <button @click="remove(stat)" style="margin-left: 10px;">х</button>
  </div>

  <pre id="raw">{{ stats }}</pre>

</template>

<style>

circle {
  fill: transparent;
  stroke: black;
}

polygon {
  fill: transparent;
  stroke: limegreen;
}

text {
  font-size: 10px;
  fill: #666;
}

label {
  display: inline-block;
  margin-left: 10px;
  width: 20px;
}

#raw {
  position: absolute;
  top: 0;
  left: 300px;
}

</style>