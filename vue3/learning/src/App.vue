<script setup>
import { ref, watchEffect } from 'vue'

const commits = ref([])
const branches = ['main', 'minor']
const API_URL = `https://api.github.com/repos/vuejs/core/commits?per_page=3&sha=`

const currentBranch = ref(branches[0])

watchEffect(async () => {
  const res = await fetch(API_URL + currentBranch.value)
  commits.value = await res.json()
})


</script>



<template>

  <template v-for="(item, index) in branches" :key="index">
    <input type="radio" v-model="currentBranch" :value="item">
  </template>

  <ul>
    <li v-for="{html_url, sha, author, commit} in commits" :key="sha">
      <li><img :src="author.avatar_url" alt=""></li>
    </li>
  </ul>




</template>



<style scoped>





</style>