<template>
  <input type="text" v-model="num1">
  <input type="text" v-model="num2">
  <button @click="calc">Вычислить</button>
  <p>{{ res }}</p>

</template>

<script>

  export default {
        data(){
          return {
            num1: '',
            num2: '',
            res: 0,
          }
        },
        methods: {
          calc(){
            this.res = ~~this.num1 + ~~this.num2
          }
        },
      }









</script>