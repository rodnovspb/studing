<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
  model: Object
})

const isOpen = ref(false)
const isFolder = computed(() => {
  return props.model.children && props.model.children.length
})

const addChild = () => {
  props.model.children.push({ name: 'Новый узел' })
}

const toggle = () => {
  isOpen.value = !isOpen.value
}

const changeType = () => {
  if(!isFolder.value){
    props.model.children = []
    addChild()
    isOpen.value = true
  }
}


</script>

<template>
  <li>
    <div :class="{ bold: isFolder }" @click="toggle" @dblclick="changeType">
    {{ model.name }}
      <span v-if="isFolder">[{{ isOpen ? '-' : '+' }}]</span>
    </div>
      <ul v-if="isFolder" v-show="isOpen">
        <TreeItem v-for="(model, index) in model.children"
                  :model="model"
                  :key="index" />
        <li @click="addChild">+</li>
      </ul>
  </li>
</template>

<style scoped>

</style>