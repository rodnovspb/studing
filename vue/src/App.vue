<template>

  <p v-for="elem of items" :key="elem">{{ elem }}</p>

</template>


<script>

  export default {
    data(){
      return {
        items: [1, 2, 3, 4, 5],
      }
    },
    methods: {

    }
  }







</script>