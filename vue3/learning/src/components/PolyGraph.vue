<script setup>
import AxisLabel from './AxisLabel.vue'
import { computed } from 'vue'

const props = defineProps({
  stats: Array
})

import { valueToPoint } from './util.js'

const points = computed(() => {
  const total = props.stats.length
  return props.stats
      .map((stat, i) => {
        const { x, y } = valueToPoint(stat.value, i, total)
        return `${x},${y}`
      })
      .join(' ')
})

</script>

<template>
  <g>
    <circle cx="100" cy="100" r="80"></circle>
    <polygon :points="points" />
    <axis-label
        v-for="(stat, index) in stats"
        :stat="stat"
        :index="index"
        :total="stats.length"
    >
    </axis-label>
  </g>
</template>

<style scoped>

</style>