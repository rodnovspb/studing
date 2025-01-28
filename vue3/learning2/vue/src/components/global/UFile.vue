<script setup>
  import { defineProps, defineEmits } from 'vue'

  defineProps({
    modelValue: String,
    label: String
  })

  const emits = defineEmits(['update:modelValue'])

  function handleFileChange(e){
    const file = e.target.files[0];
    if(file){
      emits('update:modelValue', URL.createObjectURL(file))
    }
  }

</script>

<template>
  <div>
    <div class="custom-file mt-3 mb-3">
      <label class="form-label">{{ label }}</label>
      <input type="file" class="form-control" id="customFile" @change="handleFileChange">
      <img :src="modelValue" alt="" class="w-50 mt-2">
    </div>
  </div>
</template>

<style scoped>

</style>