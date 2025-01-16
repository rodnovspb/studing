<script setup>
const emit = defineEmits(['openDrawer']);

defineProps({
  totalPrice: Number
})

</script>

<template>
  <header class="flex justify-between border-b border-slate-200 px-10 py-8">

    <router-link :to="{ name: 'home' }">
      <div class="flex items-center gap-4">
        <img src="/logo.png" alt="Лого" class="w-10">
        <div>
          <h2 class="text-xl font-bold uppercase">Vue Sneakers</h2>
          <p class="text-slate-400">Магазин лучших кроссовок</p>
        </div>
      </div>
    </router-link>

    <ul class="flex items-center gap-10">
      <li @click="emit('openDrawer')" class="flex items-center gap-3">
        <img src="/cart.svg" alt="Цена">
        <b class="text-gray-500 cursor-pointer hover:text-black">{{ totalPrice }} руб.</b>
      </li>

      <router-link :to="{ name: 'favorites' }">
        <li class="flex items-center gap-3">
          <img src="/heart.svg" alt="">
          <span class="text-gray-500 cursor-pointer hover:text-black">Закладки</span>
        </li>
      </router-link>


      <li class="flex items-center gap-3">
        <img src="/profile.svg" alt="">
        <span class="text-gray-500 cursor-pointer hover:text-black">Профиль</span>
      </li>
    </ul>

  </header>
</template>

<style scoped>

</style>
