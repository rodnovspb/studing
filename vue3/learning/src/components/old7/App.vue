<script setup>
import { ref } from 'vue'

const c = ref(0)
const f = ref(32)

const setF = (e, v = e.target.value) => {
  f.value = v * (9 / 5) + 32
  c.value = v
}

const setC = (e, v = e.target.value) => {
  c.value = (v - 32) * (5 / 9)
  f.value = v
}

</script>

<template>
  <span>Цельсий </span><input type="number" :value="c" @change="setF"><br>
  <span>Фаренгейт </span><input type="number" :value="f" @change="setC">


</template>

<style scoped>


</style>