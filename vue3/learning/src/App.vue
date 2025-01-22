<script setup>

import {ref, computed, watch} from "vue";
import { debounce } from 'lodash'

const text = ref('Текст')

const showText = ref('')

watch(text, debounce(() => showText.value = text.value, 500))







</script>



<template>

  <textarea v-model="text" ></textarea>

  <p>{{ showText }}</p>



</template>



<style scoped>





</style>