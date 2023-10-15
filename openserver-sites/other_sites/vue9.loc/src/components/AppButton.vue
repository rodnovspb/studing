<template>
  <div>
    <button @click="$emit('add', 1)">{{ title }}</button>
  </div>

</template>

<script setup>
const emit = defineEmits(['click'])

 defineProps({
  title: {
    type: String,
    default: ()=>{ return 'Текст'}
  }
})

 function func(){
   $emit('send', 111)
 }











</script>

<style scoped>

</style>