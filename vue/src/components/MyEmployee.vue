<template>
  <div>{{ a }}</div>
  <div>{{ b }}</div>
  <div>{{ c }}</div>

</template>

<script>
  export default {
   props: {
     a: String,
     b: String,
     c: Number
   },
    data(){
      return {

      }
    }
  }


</script>