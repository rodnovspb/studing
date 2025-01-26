<script setup>
import { ref, reactive, computed, watch } from 'vue'

const prefix = ref('')
const selected = ref('')
const first = ref('')
const last = ref('')

const names = reactive(['Эмиль, Ганс', 'Мустерманн, Макс', 'Тиш, Роман'])
const filteredNames = computed(() => names.filter(name => name.toLowerCase().startsWith(prefix.value.toLowerCase())))

const hasValidInput = () => first.value.trim() && last.value.trim()

const create = () => {
  if(hasValidInput()){
    let str = `${first.value}, ${last.value}`
    if(!names.includes(str)){
      names.push(str)
      first.value = last.value = ''
    }
  }
}

const update = () => {
  if(hasValidInput() && selected.value.trim()){
    let index = names.indexOf(selected.value)
    if(index !== -1){
      names[index] = selected.value = `${first.value}, ${last.value}`
      first.value = last.value = ''
    }
  }

}

const del = () => {
  names.splice(names.indexOf(selected.value), 1)
  first.value = last.value =  selected.value = ''
}

watch(selected, () => {
  [first.value, last.value] = selected.value.split(', ')
})

</script>

<template>
  <div>
    <input type="text" v-model="prefix" placeholder="Фильтрация">
  </div>
  <select v-model="selected" size="5">
    <option v-for="name in filteredNames" :key="name">{{ name }}</option>
  </select>

  <label>Имя: <input type="text" v-model="first"></label>
  <label>Фамилия: <input type="text" v-model="last"></label>

  <div class="buttons">
    <button @click="create">Создать</button>
    <button @click="update">Обновить</button>
    <button @click="del">Удалить</button>
  </div>
</template>

<style scoped>
* {
  font-size: inherit;
}

input {
  display: block;
  margin-bottom: 10px;
}

select {
  float: left;
  margin: 0 1em 1em 0;
  width: 14em;
}

.buttons {
  clear: both;
}

button + button {
  margin-left: 5px;
}
</style>