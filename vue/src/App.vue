<template>
  <input type="text" v-model="message">
  <p>{{ upper }}</p>

</template>

<script>

  export default {
        data(){
          return {
           message: "hello",
          }
        },
        computed: {
          upper(){
            return this.message.toUpperCase()
          }
        }
      }









</script>