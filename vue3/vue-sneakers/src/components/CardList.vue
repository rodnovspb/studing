<script setup>
import Card from '@/components/Card.vue'

const onClickAdd = () => alert('Добавить')
</script>

<template>
  <div class="grid grid-cols-4 gap-5">
    <Card
      title="Мужские Кроссовки Nike Blazer Mid Suede"
      imageUrl="/sneakers/sneakers-1.jpg"
      :price="1205"
      :is-added="true"
      :is-favourite="true"
      :onClickAdd="onClickAdd"
    />
  </div>
</template>

<style scoped>

</style>
