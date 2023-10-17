<template>
  <h1>Главная</h1>
  <button @click="store.increment">+</button>
  {{ store.count}}
</template>

<script setup>

import {store} from "../store";



</script>