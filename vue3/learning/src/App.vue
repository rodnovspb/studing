<script setup>

import Hello from "@/components/Hello.vue";
import {ref} from "vue";

const text = ref('текст')

</script>



<template>

  <Hello>
    {{ text }}
  </Hello>



</template>



<style scoped>


</style>