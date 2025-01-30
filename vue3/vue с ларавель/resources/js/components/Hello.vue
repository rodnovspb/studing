<script setup>
import { ref } from 'vue'

const count = ref(10)
</script>

<template>
    <h1>О нас</h1>
    <div @click="count+=50">{{ count }}</div>
</template>

<style scoped>

</style>
