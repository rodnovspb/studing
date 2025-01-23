<script setup>
import { ref } from 'vue'
import Modal from "@/components/Modal.vue";

const showModal = ref(false)

</script>

<template>
  <button @click="showModal = true">Показать модальное</button>

  <Teleport to="body">
    <Modal @close="showModal=false" :show="showModal">
      <template #header>
        <h3>Пробрасываемый заголовок</h3>
      </template>
      <template #body>
        <p>Пробрасываемое тело</p>
      </template>
      <template #footer>
        Пробрасываемый подвал
      </template>
    </Modal>
  </Teleport>

</template>

<style scoped>

</style>