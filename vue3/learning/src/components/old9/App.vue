<script setup>
import { ref, onUnmounted, computed, watchEffect } from 'vue'



const duration = ref(15 * 1000)
const elapsed = ref(0)

let lastTime
let handle


const update = () => {
  elapsed.value = performance.now() - lastTime

  if(elapsed.value >= duration.value){
    cancelAnimationFrame(handle)
  } else {
    handle = requestAnimationFrame(update)
  }

}

const progressRate = computed(() =>
    Math.min(elapsed.value / duration.value, 1)
)


const reset = () => {
  elapsed.value = 0
  lastTime = performance.now()
  update()
}

reset()

onUnmounted(() => {
  cancelAnimationFrame(handle)
})

</script>

<template>
  <label>Прошедшее время <progress :value="progressRate"></progress></label>
  <div>{{ (elapsed / 1000).toFixed(1) }}s</div>
  <div>Длительность: <input type="range" min="0" max="30000" v-model="duration">{{ (duration / 1000).toFixed(1)}}s</div>
  <button @click="reset">Сброс</button>
</template>

<style scoped>

</style>