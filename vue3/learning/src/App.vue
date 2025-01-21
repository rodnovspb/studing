<script setup>

import Hello from "@/components/Hello.vue";
import {ref} from "vue";

const text = ref(0)

</script>



<template>

  <button @click="++text">+</button>

  <Hello :data="text" />


</template>



<style scoped>


</style>