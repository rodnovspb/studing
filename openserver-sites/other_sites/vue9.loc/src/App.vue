<template>

<app-button @add="num++"></app-button>
  <div>{{ num}}</div>
  <div>{{ qqq }}</div>


</template>

<script setup>

import {computed, ref, watch} from "vue";
import AppButton from "@/components/AppButton.vue";

let num = ref(0)

let qqq = computed(()=>{ return num.value > 5 ? 'Больше' : 'Меньше' })


</script>

<style>

</style>
