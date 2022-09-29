<template>

  <input type="text" @keyup.enter="func" v-model="text">
  <p>{{ par }}</p>

</template>

<script>

  export default {
        data(){
          return {
            text: '',
            par: ''
          }
        },
        methods: {
          func(){
            this.par = this.text
          }
        }
      }








</script>