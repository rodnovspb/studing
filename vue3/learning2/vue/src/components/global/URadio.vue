<script setup>
import { defineProps, defineEmits } from 'vue'

defineProps({
  modelValue: Number,
  list: Array,
  name: String
})



const emit = defineEmits('update:modelValue')

function handleChange(e){
  emit('update:modelValue', e.target.value)
}

</script>

<template>
  <div>
    <h4>Оценка</h4>
    <div class="form-check" v-for="item in list" :key="item">
      <input :name="name" class="form-check-input" type="radio" :id="item" :value="item" :checked="modelValue === item" @change="handleChange">
      <label class="form-check-label" :for="item">
        {{ item }}
      </label>
    </div>
  </div>
</template>

<style scoped>

</style>