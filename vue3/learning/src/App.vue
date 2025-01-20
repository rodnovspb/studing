<script setup>
  import {ref} from "vue";

  const text = ref('')

  const change = (e) => {
    text.value = e.target.value
  }

</script>


<template>

  <div>{{ text }}</div>
  <input type="text" @input="change">


</template>


<style scoped>


</style>