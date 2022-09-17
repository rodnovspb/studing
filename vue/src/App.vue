<template>
  <button @click="show">Дата</button>

</template>


<script>
  export default {
      data() {
      return {
       text: 'lorem'
      }
    },
    methods: {
       show(){
         console.log(this.cape(this.text))
       },
       cape(str){
         return str[0].toUpperCase() + str.slice(1)
       }
    }
  }
</script>