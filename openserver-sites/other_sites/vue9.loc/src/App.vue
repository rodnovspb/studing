<template>

<app-input></app-input>

  {{ num }}


</template>

<script setup>
import AppInput from "@/components/AppInput.vue";
import {ref, provide } from "vue";

let num = ref(1)

function increment() {
  num.value++
}

provide('data', {num, increment})



</script>

<style>

</style>
