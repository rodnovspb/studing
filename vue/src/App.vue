<template>
  <div>
    <h1>{{ round(2) }}</h1>
  </div>
</template>


<script>

  export default {
    data(){
      return {
        num: 100.6857489,
      }
    },
    methods: {
      round(count){
        return this.num.toFixed(count)
      }
    }

  }



</script>