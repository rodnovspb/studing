<template>
  <input type="text" v-model="text1">
  <input type="text" v-model="text2">
  <button @click="replace">Поменять</button>


</template>

<script>

  export default {
        data(){
          return {
            text1: '',
            text2: '',
          }
        },
        methods: {
          replace(){
            [this.text1, this.text2] = [this.text2, this.text1]
          }
        },
      }









</script>