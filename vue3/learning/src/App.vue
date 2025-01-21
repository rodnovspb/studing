<script setup>

import {ref} from "vue";

const list = ref([1,2,3,4])

const show = ref(true)




</script>



<template>

<button @click="show = !show">Скрыть</button>
<button @click="list.push(list.length + 1)">Добавить число</button>
<button @click="list.pop()">Удалить число</button>
<button @click="list.reverse()">Перевернуть</button>

  <ul v-if="show">
    <li v-for="(item, index) in list" :key="index">{{ item }}</li>
  </ul>
  <p v-else>Список скрыт</p>



</template>



<style scoped>





</style>