<template>
  <div>
    <h2>Инпуты</h2>
    <input type="text" v-model.number="age">
    <p>{{ age }}</p>
  </div>
</template>

<script>

export default {
  data(){
    return {
      age: 20
    }
  },
  watch: {
    age(value){
      console.log(typeof value)
    }
  }
}

</script>

<style scoped>

</style>


