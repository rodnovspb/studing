<script setup>
import { ref } from 'vue'
import Hello from "@/components/Hello.vue";

const count = ref(0)
</script>

<template>
    <h1>Главная</h1>
    <a href="/about">О нас</a>

    <h1>{{ count }}</h1>
    <button @click="count++">+</button>
</template>

<style scoped>

</style>
