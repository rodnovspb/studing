<script setup>

import Hello from "@/components/Hello.vue";
import {ref} from "vue";



</script>



<template>

  <Hello @func = "console.log(1)"/>



</template>



<style scoped>


</style>