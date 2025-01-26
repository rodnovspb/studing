<script setup>
import { ref } from 'vue'
import { cells, evalCell } from '../store.js'

const props = defineProps({
  c: Number,
  r: Number
})

const editing = ref(false)

function update(e){
  editing.value = false
  cells[props.c][props.r] = e.target.value.trim()
}


</script>

<template>
  <div class="cell" :title="cells[c][r]" @click="editing = true">
    <input type="text"
           v-if="editing === true"
           :value="cells[c][r]"
           @blur="update"
           @change="update"
           @vue:mounted="({el}) => el.focus()"
    >
    <span v-else>{{ evalCell(cells[c][r]) }}</span>
  </div>
</template>

<style scoped>
.cell, .cell input {
  height: 1.5em;
  line-height: 1.5;
  font-size: 15px;
}

.cell span {
  padding: 0 6px;
}

.cell input {
  width: 100%;
  box-sizing: border-box;
}
</style>