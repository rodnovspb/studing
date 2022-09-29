<template>

  <input type="text" v-bind:disabled="isDisabled">

  <button @click="func">Переключить</button>


</template>

<script>

  export default {
        data(){
          return {
            isDisabled: false
          }
        },
        methods: {
          func(){
            this.isDisabled = !this.isDisabled
          }
        }
      }








</script>