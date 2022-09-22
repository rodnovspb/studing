<template>
  <p v-if=" day=== 1 ">Понедельник</p>
  <p v-if=" day=== 2 ">Вторник</p>
  <p v-if=" day=== 3 ">Среда</p>
  <p v-if=" day=== 4 ">Четверг</p>
</template>


<script>

  export default {
    data(){
      return {
        day: 3
      }
    }
  }







</script>