<script>

export default {
  data(){
    return {
      count: 0
    }
  },
  methods: {
    inc(){
      this.count++
    }
  }
}

</script>




<template>
  <div>{{ count }}</div>
  <button @click="inc">+</button>
</template>




<style scoped>

</style>
