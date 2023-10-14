<template>
  <div>
    <button @click="$emit('update:modelValue', !modelValue)">Кнопка</button>
    <slot name="header"></slot>
    {{ num  }}
  </div>

</template>

<script>
 export default {
   data() {
     return {

     }
   },
   props: ['modelValue'],

   inject: ['num']

 };

</script>

<style scoped>

</style>