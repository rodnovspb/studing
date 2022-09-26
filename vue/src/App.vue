<template>
  <input type="text" v-model="num">
  <button @click="calc">Вычислить</button>
  <p>{{ res }}</p>

</template>

<script>

  export default {
        data(){
          return {
            num: 0,
            res: 0,
          }
        },
        methods: {
          calc(){
            this.res = Math.sqrt(this.num)
          }
        },
      }









</script>