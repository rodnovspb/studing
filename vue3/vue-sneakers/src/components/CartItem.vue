<script setup>
const emit = defineEmits('onClickRemove')

defineProps({
  id: Number,
  imageUrl: String,
  title: String,
  price: Number,
})
</script>

<template>
  <div class="flex items-center border border-slate-200 p-4 rounded-xl gap-4 mb-5">
    <img class="w-16 h-16" :src="imageUrl" :alt="title">
    <div class="flex flex-col flex-1">
      <p>{{ title }}</p>

      <div class="flex justify-between mt-2">
        <b class="flex-1">{{ price }} руб.</b>
        <img @click="emit('onClickRemove')" class="opacity-40 hover:opacity-100 transition cursor-pointer" src="/close.svg" alt="">
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
