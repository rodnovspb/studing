<template>

  <input type="text" v-bind:disabled="dis">

  <input type="checkbox" v-model="dis">


</template>

<script>

  export default {
        data(){
          return {
            dis: false
          }
        },
        methods: {
          func(){
            this.isDisabled = !this.isDisabled
          }
        }
      }








</script>