<script setup>
import { ref } from 'vue'

// выдаем всем todo уникальные id
let id = 0

const newTodo = ref('')
const todos = ref([
  { id: id++, text: 'Изучить HTML' },
  { id: id++, text: 'Изучить JavaScript' },
  { id: id++, text: 'Изучить Vue' }
])

function addTodo() {
  todos.value[0].push({ id: id++, text: newTodo.value })
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
  <ul>
    <li v-for="todo in todos" :key="todo.id">
      {{ todo.text }}
      <button @click="removeTodo(todo)">X</button>
    </li>
  </ul>
</template>