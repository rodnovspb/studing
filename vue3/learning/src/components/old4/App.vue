<script setup>
import { ref } from 'vue'
import { shuffle as _shuffle } from 'lodash'

const getInitialItems = () => [1, 2, 3, 4, 5]
const items = ref(getInitialItems())
let id = items.value.length + 1

const shuffle = () => items.value = _shuffle(items.value)

const insert = () => {
  const i = Math.round(Math.random() * items.value.length)
  items.value.splice(i, 0, id++)
}

const remove = (item) => {
  items.value.splice(items.value.indexOf(item), 1)
}

const reset = () => items.value = getInitialItems()

</script>

<template>
  <button @click="insert">Вставка по произвольному индексу</button>
  <button @click="reset">Сброс</button>
  <button @click="shuffle">Перемешать</button>

  <TransitionGroup name="fade" tag="ul" class="container">
    <li v-for="item in items" :key="item" class="item">
      {{ item }}
      <button @click="remove(item)">x</button>
    </li>
  </TransitionGroup>
</template>

<style scoped>
.container {
  position: relative;
  padding: 0;
  list-style-type: none;
}

.item {
  width: 100%;
  height: 30px;
  background-color: #f3f3f3;
  border: 1px solid #666;
  box-sizing: border-box;
}

.fade-move,
.fade-enter-active,
.fade-leave-active {
  transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
}

/* 2. объявление enter from и leave to состояний */
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: scaleY(0.01) translate(30px, 0);
}

/* 3. убедитесь, что элементы удалены из потока layout,
      чтобы можно было правильно рассчитать анимацию перемещения */
.fade-leave-active {
  position: absolute;
}

</style>