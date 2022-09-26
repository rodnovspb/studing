<template>
  <input type="text" v-model="message">
  <p>{{ square() }}</p>

</template>

<script>

  export default {
        data(){
          return {
           message: 1,
          }
        },
        methods: {
          square(){
            return this.message**2
          }
        },
        computed: {
          upper(){
            return this.message.toUpperCase()
          }
        }
      }









</script>