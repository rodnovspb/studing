<template>
  <div v-for="elem in items" :key="elem">
    <p>{{ elem }}</p>
    <p class="divider"></p>
  </div>


</template>


<script>

  export default {
    data(){
      return {
        items: [1, 2, 3],
      }
    },
    methods: {

    }
  }







</script>