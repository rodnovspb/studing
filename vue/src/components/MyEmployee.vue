<template>
  <div>{{ name }}</div>
  <div>{{ surname }}</div>
  <div>{{ age }}</div>
</template>

<script>
  export default {
    props: ['name', 'surname', 'age'],
    data(){
      return {

      }
    }
  }


</script>