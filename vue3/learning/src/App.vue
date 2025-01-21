<script setup>
import {computed, ref} from 'vue'

// выдаем всем todo уникальные id
let id = 0
const showCompleted = ref(false)

const newTodo = ref('')
const todos = ref([
  { id: id++, text: 'Изучить HTML', done: false },
  { id: id++, text: 'Изучить JavaScript', done: false },
  { id: id++, text: 'Изучить Vue', done: false }
])

const filteredTodos = computed(() => {
  if(showCompleted.value){
    return todos.value.filter((item) => !item.done)
  } else {
    return todos.value
  }

  })



function addTodo() {
  todos.value.push({ id: id++, text: newTodo.value, done: false })
  newTodo.value = ''
}

function removeTodo(todo) {
  todos.value = todos.value.filter((elem) => {
    if(elem.id !== todo.id){
      return true;
    } else {
      return false;
    }
  })


}
</script>

<template>
  <form @submit.prevent="addTodo">
    <input v-model="newTodo" required placeholder="new todo">
    <button>Добавить задачу</button>
  </form>
  <button @click="showCompleted = !showCompleted">{{ !showCompleted ? 'Скрыть выполненные' : 'Показать все'  }}</button>
  <ul>
    <li v-for="todo in filteredTodos" :key="todo.id">
      <input type="checkbox" v-model="todo.done">
      {{ todo.text }}
      <button @click="removeTodo(todo)">X</button>
    </li>
  </ul>
</template>