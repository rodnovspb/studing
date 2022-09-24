<template>

  <p v-for="elem of items" :key="elem">{{ Math.pow(elem, 2) }}</p>

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