<template>
  <div>{{ name }}</div>
  <div>{{ salary }}</div>
  <div>{{ age }}</div>

</template>

<script>
  export default {
   props: {
     name: String,
     salary: Number,
     age: Number
   },
    data(){
      return {

      }
    }
  }


</script>