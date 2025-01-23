<script setup>
defineProps({
  show: Boolean
})

const emit = defineEmits(['close'])
</script>

<template>
  <Transition name="modal">
    <div class="modal-mask" v-if="show">
      <div class="modal-container">
        <div class="modal-header">
          <slot name="header">
            <h3>Заголовок по умолчанию</h3>
          </slot>
        </div>
        <div class="modal-body">
          <slot name="body">
            Тело по умолчанию
          </slot>
        </div>
        <div class="modal-footer">
          <slot name="footer">
            Подвал по умолчанию
          </slot>
        </div>
        <button class="modal-default-button" @click="emit('close')">Закрыть</button>
      </div>
    </div>
  </Transition>



</template>

<style scoped>
.modal-mask {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 1000;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  transition: opacity 0.3s ease;
}

.modal-container {
  width: 300px;
  margin: auto;
  background-color: bisque;
  padding: 20px 40px;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  transform: scale(1.1);
}

</style>