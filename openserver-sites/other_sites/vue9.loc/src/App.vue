<template>
  <div>
     <div style="display: flex; gap: 20px;">
      <router-link :to="{ name: 'home'}">На главную</router-link>
      <router-link :to="{ name: 'posts'}">Статьи</router-link>
     </div>
     <router-view></router-view>
  </div>

</template>

<script setup>



</script>

<style scoped>

</style>