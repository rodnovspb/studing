<template>
  <div>Записано: {{ text }}</div>
  <button @click="increment">Увеличить</button>
</template>


<script>

  export default {
      data() {
      return {
        text: 0
      }
    },
    methods: {
      increment(){
        this.text+=1
      }
    }
  }

</script>