<script setup>
import CardList from '@/components/CardList.vue'
import { onMounted, ref } from 'vue'
import axios from 'axios'

const favorites = ref([])

onMounted(async () => {
  try {
    const {data} = await axios.get('https://d94eb65ecac06b79.mokky.dev/favorites?_relations=items')
    favorites.value = data.map(obj => obj.item)

  } catch (e) {
    console.log(e)
  }
})



</script>

<template>
  <h1>Мои закладки</h1>
  <CardList :items="favorites" />
</template>

<style scoped>

</style>
