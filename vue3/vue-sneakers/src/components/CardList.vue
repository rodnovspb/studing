<script setup>
import Card from '@/components/Card.vue'

defineProps({
  items: Array,
  isFavorites: Boolean
})

const emit = defineEmits(['addToFavourite', 'addToCart'])




</script>

<template>
  <div class="grid grid-cols-4 gap-5" v-auto-animate>
    <Card
      v-for="item in items"
      :key="item.id"
      :id="item.id"
      :title="item.title"
      :imageUrl="item.imageUrl"
      :price="item.price"
      :is-added="true"
      :is-favourite="item.isFavourite"
      :on-click-add="isFavorites ? () => emit('addToCart', item) : null"
      :on-click-favourite="isFavorites ? () => emit('addToFavourite', item) : null"
      :isAdded="item.isAdded"
    />
  </div>
</template>

<style scoped>

</style>
