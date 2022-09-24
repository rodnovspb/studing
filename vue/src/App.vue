<template>
  <ul>
    <template v-for="elem of items" :key="elem">
      <li>{{ elem }}</li>
      <li class="divider"></li>
    </template>
  </ul>



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