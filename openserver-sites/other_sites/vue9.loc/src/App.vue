<template>

<button @click="increment">+</button>
  <div>{{ num}}</div>
  <div>{{ qqq }}</div>


</template>

<script setup>

import {computed, ref, watch} from "vue";

let num = ref(0)

function increment(){
  num.value++
}

let qqq = computed(()=>{ return num.value > 5 ? 'Больше' : 'Меньше' })


watch(num, (newValue, oldValue)=>{
  console.log(newValue)
})


</script>

<style>

</style>
