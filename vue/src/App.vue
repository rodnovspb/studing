<template>

  <ul>
    <template v-for="elem of arr" :key="elem">
      <li v-if=" elem % 2 === 0 ">{{ elem }}</li>
    </template>
  </ul>


</template>


<script>

  export default {
    data(){
      return {
        arr: [1, 2, 3, 4, 5],
      }
    },
    methods: {

    }
  }







</script>