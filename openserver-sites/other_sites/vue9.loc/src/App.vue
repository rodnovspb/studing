<script setup>
import { ref, computed } from 'vue'
import Home from "@/views/Home.vue";
import About from "@/views/About.vue";
import NotFound from "@/views/NotFound.vue";


const routes = {
  '/': Home,
  'about': About
}

const currentPath = ref(window.location.hash)


window.onhashchange = () => {
  currentPath.value = window.location.hash
  console.log(currentPath.value.slice(1))
}

const currentView = computed(() => {
  return routes[currentPath.value.slice(1) || '/'] || NotFound
})
</script>

<template>
  <a href="#">Home</a> |
  <a href="#about">About</a> |
  <a href="#non-existent-path">Broken Link</a>
  <component :is="currentView" />
</template>