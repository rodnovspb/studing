<script setup>

import Hello from "@/components/Hello.vue";
import {ref} from "vue";

const text = ref(0)

</script>



<template>
  <p>3</p>
  <button onclick="document.querySelector('p').textContent ++">+</button>

  <Hello :data="text" />


</template>



<style scoped>


</style>