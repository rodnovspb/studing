<script setup>
import { ref, watchEffect, computed } from 'vue'

const addTodo = (e) => {
  const value = e.target.value
  if(value){
    todos.value.push({
      id: Date.now(),
      title: value,
      completed: false
    })
    e.target.value = ''
  }
}

const filters = {
  all: (todos) => todos,
  active: (todos) => todos.filter((todo) => !todo.completed),
  completed: (todos) => todos.filter((todo) => todo.completed)
}

const remaining = computed(() => filters.active(todos.value).length)
const STORAGE_KEY = 'vue-todomvc'
const visibility = ref('all')
const editedTodo = ref()
const todos = ref(JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]'))

const filteredTodos = computed(() => {
  return filters[visibility.value](todos.value)
})

const toggleAll = (e) => todos.value.forEach(item => item.completed = e.target.checked)
const doneEdit = (todo) => {
  if(editedTodo.value){
    editedTodo.value = null
    todo.title =  todo.title.trim()
    if(!todo.title) {
      removeTodo(todo)
    }
  }
}

const cancelEdit = (todo) => {
  editedTodo.value = null
  todo.title = beforeEditCache
}

const removeCompleted = () => {
  todos.value = filters.active(todos.value)
}

const removeTodo = (todo) => todos.value.splice(todos.value.indexOf(todo), 1)

let beforeEditCache = ''
const editTodo = (todo) => {
  beforeEditCache = todo.title
  editedTodo.value = todo
}

watchEffect(() => localStorage.setItem(STORAGE_KEY, JSON.stringify(todos.value)))

const onHashChange = () => {
  const route = window.location.hash.replace(/#?/, '')

  if(filters[route]){
    visibility.value = route
  } else {
    window.location.hash = ''
    visibility.value = 'all'
  }
}

window.addEventListener('hashchange', onHashChange)
onHashChange()



</script>

<template>
  <section class="todoapp">
    <header class="header">
      <h1>Задачи</h1>
      <input type="text"
             autofocus
             class="new-todo"
             placeholder="Что необходимо сделать?"
             @keyup.enter="addTodo"
      >
    </header>
    <section class="main" v-if="todos.length">
      <input
          id="toggle-all"
          class="toggle-all"
          type="checkbox"
          :checked="remaining === 0"
          @change="toggleAll"
      >
      <label for="toggle-all">Пометить все как завершенные</label>
      <ul>
        <li v-for="todo in filteredTodos"
            :key="todo.id"
            class="todo"
            :class="{ completed: todo.completed, editing: todo === editedTodo }"
        >
          <div class="view">
            <input type="checkbox" v-model="todo.completed" class="toggle">
            <label @dblclick="editTodo(todo)">{{ todo.title }}</label>
            <button class="destroy" @click="removeTodo(todo)">x</button>
          </div>
          <input type="text"
                 v-if="todo === editedTodo"
                 class="edit"
                 v-model="todo.title"
                 @vue:mounted="({el}) => el.focus()"
                 @blur="doneEdit(todo)"
                 @keyup.enter="doneEdit(todo)"
                 @keyup.escape="cancelEdit(todo)"
          >
        </li>
      </ul>
    </section>
    <footer class="footer" v-show="todos.length">
      <span class="todo-count">
        <span>{{ remaining }}</span>
        <span>{{ remaining === 1 ? 'задача' : [2,3,4].includes(remaining) ? ' задачи' : ' задач'}} осталось</span>
      </span>
      <ul class="filters">
        <li>
          <a href="#all" :class="{ selected: visibility === 'all' }">Все</a>
        </li>
        <li>
          <a href="#active" :class="{ selected: visibility === 'active' }">Активные</a>
        </li>
        <li>
          <a href="#completed" :class="{ selected: visibility === 'completed' }">Завершенные</a>
        </li>
      </ul>
      <button class="clear-completed" @click="removeCompleted" v-show="todos.length > remaining">Удалить завершенные</button>
    </footer>
  </section>
</template>

<style scoped>
  @import "https://unpkg.com/todomvc-app-css@2.4.1/index.css";
</style>