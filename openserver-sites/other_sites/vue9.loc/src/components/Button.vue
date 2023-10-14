<template>
  <div>
    <button @click="$emit('update:modelValue', !modelValue)">Кнопка</button>
    <input type="text" ref="inp">
  </div>

</template>

<script>
 export default {
   data() {
     return {
        elem1: 5
     }
   },

   methods: {
     log(){

     }
   },

   props: ['modelValue'],

   mounted() {
     console.log(this.$refs.inp)
   }

 };

</script>

<style scoped>

</style>