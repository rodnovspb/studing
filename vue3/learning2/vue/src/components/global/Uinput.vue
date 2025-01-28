<script setup>
import { defineProps, defineEmits, watch, ref } from 'vue'

const { modelValue } = defineProps({
  modelValue: String,
  placeholder: String,
  type: {
    type: String,
    default: 'text',
    validator: (value) => [
       'text',
       'textarea',
       'password',
       'tel',
       'email'
    ].includes(value)
  }
})

const value = ref(modelValue)

const emits = defineEmits(['update:modelValue'])

watch(value, () => {
  emits('update:modelValue', value)
})


</script>

<template>
  <div>
    <input
        v-if="type !== 'textarea'"
        v-model="value"
        :type="type"
        :placeholder="placeholder"
        class="form-control mb-3"
    >

    <textarea
        v-else
        v-model="value"
        rows="3"
        class="form-control mb-3"
        :placeholder="placeholder"
    ></textarea>
  </div>

</template>

<style scoped>

</style>