<script setup>
import { ref, reactive } from 'vue';

const users = ref([
  { name: 'Денис', age: 38 },
  { name: 'Вася', age: 39 },
  { name: 'Женя', age: 40 },
  { name: 'Митя', age: 41 }
])

</script>

<template>
  <ul>
    <li
        v-for="(item, index) in users"
        :key="index"
        :class="{ red: item.age > 39 }"
    >
      {{ item.name }}</li>
  </ul>

</template>

<style>
  .red {
    color: red;
}
</style>
