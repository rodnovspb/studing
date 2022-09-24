<template>

 <template v-for="elem of items" :key="elem">
    <p v-if="elem > 0"> {{ elem }}</p>
 </template>


</template>


<script>

  export default {
    data(){
      return {
        items: [1, -2, 3, -4, 5],
      }
    },
    methods: {

    }
  }







</script>