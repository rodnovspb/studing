<template>

  <ul v-for="elem of items" :key="elem">
    <li>{{ elem }}</li>
  </ul>

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