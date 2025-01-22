<script setup>
import { ref } from 'vue'
import TreeItem from "@/components/TreeItem.vue";



const treeData = ref({
  name: 'Мое дерево',
  children: [
    { name: 'привет' },
    { name: 'мир' },
    {
      name: 'дочерняя папка',
      children: [
        {
          name: 'дочерняя папка',
          children: [{ name: 'привет' }, { name: 'мир' }]
        },
        { name: 'привет' },
        { name: 'мир' },
        {
          name: 'дочерняя папка',
          children: [{ name: 'привет' }, { name: 'мир' }]
        }
      ]
    }
  ]
})
</script>

<template>
  <ul>
    <TreeItem class="item" :model="treeData" />
  </ul>

</template>

<style>
.item {
  cursor: pointer;
  line-height: 1.5;
}
.bold {
  font-weight: bold;
}
</style>